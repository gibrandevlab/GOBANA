<?php
session_start();
include 'main/model/database/conn.php';

if (isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $nama = $_POST['nama']; // Menambahkan pengambilan variabel nama

    // Reset session error dan success
    unset($_SESSION['error']);
    unset($_SESSION['success']);

    // Validasi input kosong
    if (empty($email) || empty($password) || empty($nama)) {
        $_SESSION['error'] = "Email, password, atau nama tidak boleh kosong.";
        header("Location: register.php");
        exit();
    }

    // Validasi format email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error'] = "Format email tidak valid.";
        header("Location: register.php");
        exit();
    }

    // Enkripsi password sebelum menyimpan ke database
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Melakukan query ke database untuk memeriksa apakah email sudah terdaftar
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        $_SESSION['error'] = "Terjadi kesalahan pada persiapan statement.";
        header("Location: register.php");
        exit();
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    // Memeriksa apakah email sudah terdaftar
    if ($result->num_rows > 0) {
        $_SESSION['error'] = "Email sudah terdaftar.";
        header("Location: register.php");
        exit();
    }

    // Menyimpan data pengguna baru ke dalam database
    $sql_insert = "INSERT INTO user (email, password, id_role, nama) VALUES (?, ?, 2, ?)";
    $stmt_insert = $conn->prepare($sql_insert);
    if ($stmt_insert === false) {
        $_SESSION['error'] = "Terjadi kesalahan pada persiapan statement.";
        header("Location: register.php");
        exit();
    }
    $stmt_insert->bind_param("sss", $email, $hashed_password, $nama); // Mengubah bind_param agar sesuai dengan parameter yang dibutuhkan
    if ($stmt_insert->execute()) {
        $_SESSION['success'] = "Registrasi berhasil. Silakan login.";
        header("Location: login.php");
        exit();
    } else {
        $_SESSION['error'] = "Registrasi gagal. Silakan coba lagi.";
        header("Location: register.php");
        exit();
    }

    $stmt->close();
    $stmt_insert->close();
    $conn->close();
} else {
    header("Location: register.php"); // Redirect ke form register jika form belum disubmit
    exit();
}
?>
