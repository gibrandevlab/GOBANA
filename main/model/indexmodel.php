<?php
// Panggil File Konek Ke database
include 'database/conn.php';

$sql = "SELECT id, nama_produk, harga_jual, harga_diskon, gambar 
        FROM product 
        ORDER BY j_beli DESC 
        LIMIT 6";

$result = $conn->query($sql);

$productData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $productData[] = $row;
    }
}

$conn->close();
?>
