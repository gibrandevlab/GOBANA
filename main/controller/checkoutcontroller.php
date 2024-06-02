<?php
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] == null) {
    header("Location: ../../login.php");
    exit();
}

require_once '../model/database/conn.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM datauser WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();


if ($result->num_rows > 0) {
    $user_data = $result->fetch_assoc();
    $nama = $user_data['nama'];
    $alamat = $user_data['alamat'];
    $nomor_telpon = $user_data['nomor_telpon'];
    $id = $user_data['id'];
} else {
    echo "Pengguna tidak ditemukan.";
}

$stmt->close();
$conn->close();
?>