<?php
// Informasi koneksi database
$servername = "localhost"; // Server database (usually localhost if using XAMPP)
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi database, usually empty in XAMPP
$database = "gobana"; // Nama database

// Membuat koneksi
$conn = new mysqli($servername, $username, $password, $database, 3306);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Tidak perlu pesan koneksi berhasil di sini

// Tutup koneksi
//$conn->close(); // It's better to close the connection where it's used, not here.
?>
