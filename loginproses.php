<?php
session_start();
include 'main/model/database/conn.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input kosong
    if (empty($email) || empty($password)) {
        echo "Email atau password tidak boleh kosong.";
        exit();
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Format email tidak valid.";
        exit();
    }

    // Melakukan query ke database untuk memeriksa pengguna
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        echo "Terjadi kesalahan pada persiapan statement.";
        exit();
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah pengguna ditemukan
    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        // Verifikasi password
        if (password_verify($password, $user['password'])) {
            // Simpan informasi pengguna ke dalam session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_email'] = $user['email'];
            $_SESSION['user_role'] = $user['id_role'];

            // Redirect berdasarkan nilai id_role
            if ($user['id_role'] == 2) {
                header("Location: directuser.php");
            } elseif ($user['id_role'] == 99) {
                header("Location: directadmin.php");
            } elseif ($user['id_role'] == 999) {
                header("Location: directgod.php");
            } else {
                echo "Role tidak dikenal.";
                exit();
            }
            exit();
        } else {
            echo "Password salah.";
        }
    } else {
        $_SESSION['error'] = 'Email atau password tidak ditemukan';
        header("Location: login.php");
        exit();
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Form login belum disubmit.";
}
?>
