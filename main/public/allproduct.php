<?php
include '../model/database/conn.php';

$sql = "SELECT `id`, `nama_produk`, `harga_jual`, `harga_diskon`, `sub_kategori`, `stok`, `j_view`, `j_beli`, `gambar` FROM product ORDER BY `j_beli` DESC, `stok` LIMIT 6";
$result = $conn->query($sql);
$ids = [];
$products = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $products[] = $row;
    }
} else {
    echo "0 results";
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOBANA</title>
    <link rel="icon" href="assets/icon/logoheader.png">
    <link rel="stylesheet" href="css/allproduct.css">
</head>

<body>
    <?php
    $Allproduct='
    <div class="container">
        <div class="headerallproduct">REKOMENDASI</div>
        <!-- <div class="search-bar">
            <input type="text" id="searchInput" placeholder="Cari produk..." disabled>
        </div> -->
        <div class="wrapallproduct">
            <div class="allproductcontainer" id="productContainer">';
                if (!empty($products)) {
                    foreach ($products as $product) {
                        $Allproduct .= '
                        <a class="itemLink" href="../model/prosesbeforedesc.php?nama_produk='. urlencode($product['nama_produk']) .'">
                            <div class="itemproduct">
                                <img src="../public/assets/images/'. htmlspecialchars($product['gambar']) .'" alt="'. htmlspecialchars($product['nama_produk']) .'" style="width:100%;">
                                <h3>'. htmlspecialchars($product['nama_produk']) .'</h3>
                                <p class="price">Rp '. number_format($product['harga_jual'], 0, ',', '.') .'</p>
                                <p class="stok">Stok: '. htmlspecialchars($product['stok']) .'</p>
                                <p class="sell">'. htmlspecialchars($product['j_beli']) .' Produk Terjual</p>
                                <br>
                                <div class="button">Pesan Produk</div>
                            </div>
                        </a>
                        
                        ';
                    }
                } else {
                    $Allproduct .= '<p>Tidak ada produk ditemukan.</p>';
                }
            $Allproduct .= '
            </div>
        
        
    </div>
    <script src="script/allproductscript.js"></script>';
    
    ?>
</body>
</html>
</html>

