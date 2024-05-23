<?php
if (isset($_GET['produk'])) {
    $produk = $_GET['produk'];
    
    // Periksa panjang minimal dan validitas input produk
    if (strlen($produk) >= 4) {
        include '../model/database/conn.php';
        
        $subkategori = substr($produk, 4); // Mengambil subkategori dari produk, misal 'tipe1' menjadi '1'
        
        $query = "SELECT `id`, `nama_produk`, `harga_jual`, `harga_diskon`, `sub_kategori`, `stok`, `j_view`, `j_beli`, `gambar` FROM `product` WHERE `sub_kategori` = ?";
        
        if ($stmt = $conn->prepare($query)) {
            $stmt->bind_param('s', $subkategori);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if ($result->num_rows > 0) {
                echo '<div class="top-grid-content">
                      <h2 class="ask">Temukan Produk Yang Anda Inginkan</h2>
                      <div class="top-grid-container">';
    
                while ($row = $result->fetch_assoc()) {
                    $namaproduk = htmlspecialchars($row['nama_produk'], ENT_QUOTES, 'UTF-8');
                    $harga_jual = number_format($row['harga_jual'], 0, ',', '.');
                    $harga_diskon = $row['harga_diskon'] > 0 ? 'Rp. ' . number_format($row['harga_diskon'], 0, ',', '.') : '';
                    $gambar = htmlspecialchars($row['gambar'], ENT_QUOTES, 'UTF-8');
    
                    echo '<div class="top-grid-item">
                          <a href="">
                              <img class="img1" src="../public/assets/images/' . $gambar . '" alt="' . $namaproduk . '">
                              <div class="overlay visible"></div>
                              <p>' . $namaproduk . '</p>
                              <span>Rp. ' . $harga_jual . '</span><span class="diskon">' . $harga_diskon . '</span>
                          </a>
                      </div>';
                }
    
                echo '</div></div>';
            } else {
                echo '<div class="no-product-message">Maaf tidak ada produk yang sesuai</div>';
            }
            
            $stmt->close();
        } else {
            include 'error.php';
        }
    } else {
        include 'error.php';
    }
} else {
    include 'error.php';
}
?>
