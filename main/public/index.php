<?php
// Sertakan file model.php dari direktori model
include '../model/indexmodel.php';
include 'allproduct.php';

session_start();

// Cek apakah pengguna sudah login dan memiliki role yang sesuai
if (!isset($_SESSION['user_id']) || !isset($_SESSION['user_role']) || $_SESSION['user_role'] != 2) {
    // Jika tidak, redirect ke halaman login atau halaman error
    header("Location: login.php");
    exit();
}

// Menjaga session tetap aman
session_regenerate_id(true);
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TISIUNIVERSE</title>
    <link rel="stylesheet" href="css/main.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
</head>

<body>
<div class="notification">
Welcome User <?php echo $_SESSION['user_id']; ?>! :)
</div>

<script>
// Select the notification element
var notification = document.querySelector('.notification');

// Hide the notification after 1.5 seconds
setTimeout(function() {
  notification.style.display = 'none';
}, 500); // 1.5 seconds
</script>
<nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <label class="logo">GOBANA</label>
        <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#galeri">Gallery</a></li>
        
        </ul>
    </nav>

    <div class="box intro" id="home">
        <video autoplay muted loop>
            <source src="assets/videos/videoiklan.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    </div>

    <div class="tester" id="tentang">
        <img src="assets/images/toko bunga.jpeg"></img>
        <div class="info">
            <p style="line-height: 1; font-family: sans-serif; font-size: 42px; color: rgb(0, 0, 0); font-weight: bold; text-align: left; letter-spacing: 2px;">
                Visi & Misi Gobana</p><br>
            <p style="letter-spacing: 1px; color: black; line-height: 1.5em; ">visi kami adalah menjadi penyedia bunga pilihan utama yang menginspirasi keindahan dan kebahagiaan dalam setiap
                momen. Untuk mencapai visi tersebut, kami memiliki beberapa misi yang kami pegang teguh. Kami menyediakan
                berbagai jenis bunga berkualitas tinggi yang segar dan indah untuk memenuhi kebutuhan setiap pelanggan. Layanan
                pelanggan yang ramah, responsif, dan profesional adalah prioritas kami, karena kami ingin memberikan pengalaman
                berbelanja yang memuaskan. Kami juga berkomitmen untuk mendukung keberlanjutan lingkungan dengan memprioritaskan
                pembelian bunga dari sumber yang berkelanjutan dan ramah lingkungan. Melalui desain dan aransemen bunga yang
                inovatif dan menarik, kami ingin menginspirasi kreativitas dan keindahan. Kami selalu berusaha untuk terus
                belajar dan berkembang guna menjaga kualitas produk dan layanan yang kami tawarkan.</p>
        </div>
    </div>

    <div class="grid-content" >
    <h2 class="ask">Lagi Cari Apa?</h2>
    <div class="grid-container">
      <div class="grid-item">
        <a href="typeproduct.php?produk=tipe1">
          <img src="assets/images/bunga.webp" alt="Image 1">
          <div class="overlay visible"></div>
          <p>Buket Bunga</p>
        </a>

      </div>
      <div class="grid-item">
        <a href="typeproduct.php?produk=tipe2">
          <img src="assets/images/hampers.webp" alt="Image 2">
          <div class="overlay visible">
          </div>
          <p>Hampers</p>
        </a>
      </div>
      <div class="grid-item">
        <a href="typeproduct.php?produk=tipe3">
          <img src="assets/images/baket.webp" alt="Image 3">
          <div class="overlay visible">
          </div>
          <p>Bloom Box</p>
        </a>
      </div>
      <div class="grid-item">
        <a href="typeproduct.php?produk=tipe4">
          <img src="assets/images/papan.webp" alt="Image 4">
          <div class="overlay visible">
          </div>
          <p>Bunga Papan</p>
        </a>
      </div>
      <div class="grid-item">
        <a href="typeproduct.php?produk=tipe5">
          <img src="assets/images/vas.webp" alt="Image 5">
          <div class="overlay visible">
          </div>
          <p>Bunga Meja</p>
        </a>
      </div>
      <div class="grid-item">
        <a href="typeproduct.php?produk=tipe6">
          <img src="assets/images/stand.webp" alt="Image 6">
          <div class="overlay visible">
          </div>
          <p>Standing Flower</p>
        </a>
      </div>

    </div>
  </div>

    <!-- div class="top-grid-content">
        <h2 class="ask">Produk Terlaris</h2>
        <div class="top-grid-container">
            <?php foreach ($productData as $product) : ?>
                <div class='top-grid-item'>
                    <a href='checkout.php?id=<?= $product["id"] ?>'>
                        <img src='assets/images/<?= htmlspecialchars($product["gambar"]) ?>' alt='Image'>
                        <div class='overlay visible'></div>
                        <p><?= htmlspecialchars($product["nama_produk"]) ?></p>
                        <span> Rp. <?= htmlspecialchars($product["harga_jual"]) ?></span>
                        <?php if (!empty($product["harga_diskon"])) : ?>
                            <span class='diskon'> Rp. <?= htmlspecialchars($product["harga_diskon"]) ?></span>
                        <?php endif; ?>
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div -->
    <?php
    echo '<div id="produk"></div>';
    echo $Allproduct;
?>


    
</body>

</html>
