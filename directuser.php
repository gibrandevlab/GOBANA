<?php
session_start();

// Cek apakah pengguna sudah login dan memiliki role yang sesuai
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
    // Jika tidak, redirect ke halaman login atau halaman error
    header("Location: login.php");
    exit();
}

// Menjaga session tetap aman
session_regenerate_id(true);

// Redirect ke halaman utama jika berhasil login
header("Location: main/public/index.php");
exit();

