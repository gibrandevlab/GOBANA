<?php
// Memeriksa apakah parameter 'id' telah diset dan bukan null
if (isset($_GET['id']) && $_GET['id'] !== '') {
    // Mengambil nilai 'id' dari URL
    $id = $_GET['id'];

    // Include file koneksi ke database
    include 'asset/conn.php';

    // Query SQL untuk mengambil data produk berdasarkan id
    $query = "SELECT * FROM product WHERE id = $id";
    $result = mysqli_query($conn, $query);

    // Memeriksa apakah query berhasil dieksekusi
    if ($result) {
        // Mengambil satu baris data dari hasil query
        $row = mysqli_fetch_assoc($result);

        // Menyimpan nilai kolom-kolom yang dibutuhkan ke dalam variabel
        $nama_produk = $row['nama_produk'];
        $harga_jual = $row['harga_jual'];
        $harga_diskon = $row['harga_diskon'];
        $sub_kategori = $row['sub_kategori'];
        $stok = $row['stok'];
        $j_view = $row['j_view'];
        $j_beli = $row['j_beli'];
        $gambar = $row['gambar'];
    } else {
        // Menampilkan pesan error jika query gagal dieksekusi
        echo "Error: " . mysqli_error($conn);
    }

    // Menutup koneksi database
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout <?php echo $id ?></title>
    <link rel="stylesheet" href="checkout.css">
</head>

<body>
    <header>

    </header>
    <form action="checkoutproses.php" method="post">
        <div class="checkoutform">
            <div class="topalamat"></div>
            <div class="alamat">
                <div class="vtr">
                    <img src="image/icon/lokasi.png">
                    <h2>Alamat Pengiriman</h2>
                </div>
                <div class="userdata">
                    <div class="nomor">
                        <h5>Nomor Telepon</h5>
                        <input type="number" maxlength="15" name="nomor" placeholder="Contoh : 081287648156">
                    </div>
                    <div class="rumah">
                        <h5>Alamat</h5>
                        <input type="text" maxlength="250" placeholder="Contoh : Taman Cendrawasih Blok C12 NO19 Bahagia, Babelan, Kabupaten Bekasi.">
                    </div>
                </div>
            </div>
        

    </form>
</body>

</html>