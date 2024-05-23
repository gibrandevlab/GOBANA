<?php
// Sertakan file koneksi
include 'database/conn.php';

if (isset($_GET['nama_produk'])) {
    // Ambil nilai nama_produk dari parameter URL dan filter input
    $nama_produk = htmlspecialchars($_GET['nama_produk'], ENT_QUOTES, 'UTF-8');
    
    // Siapkan pernyataan SQL untuk mengambil nilai j_view berdasarkan nama_produk
    $stmt = $conn->prepare("SELECT j_view FROM product WHERE nama_produk = ?");
    $stmt->bind_param("s", $nama_produk);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Ambil nilai j_view
        $row = $result->fetch_assoc();
        $current_j_view = $row['j_view'];

        // Tambahkan 1 ke j_view
        $new_j_view = $current_j_view + 1;

        // Siapkan pernyataan SQL untuk mengupdate nilai j_view
        $update_stmt = $conn->prepare("UPDATE product SET j_view = ? WHERE nama_produk = ?");
        $update_stmt->bind_param("is", $new_j_view, $nama_produk);
        if ($update_stmt->execute() === TRUE) {
            // Setelah berhasil mengupdate, redirect ke ../public/descproduct.php
            header("Location: ../public/descproduct.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "Data tidak ditemukan.";
    }

    // Tutup pernyataan
    $stmt->close();
} else {
    echo "Parameter 'nama_produk' tidak ditemukan.";
}

// Tutup koneksi
$conn->close();
?>
