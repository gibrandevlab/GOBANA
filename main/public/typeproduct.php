
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TISIUNIVERSE</title>
  <link rel="stylesheet" href="css/main.css">
  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
  <style>.no-product-message {
    text-align: center;
    font-size: 18px;
    margin-top: 20px;
    color: #555;
}
</style>
</head>

<body>
  <div class="wrapper">
    <header>
      <nav>
        <div class="logo">GOBANA</div>
        <div class="menu">
          <ul>
            <li><a href="#home">Home</a></li>
            <li><a href="#tentang">Tentang</a></li>
            <li><a href="#produk">Produk</a></li>
            <li><a href="#">Berita</a></li>
          </ul>
        </div>
  </div>
  </nav>
  </header>
  </div>



  <div class="box intro" id="home">
    <video autoplay muted loop>
      <source src="assets/videos/videoiklan.mp4" type="video/mp4">
      Your browser does not support the video tag.
    </video>
  </div>

  <?php 
include '../model/typeproductmodel.php';
  ?>
</body>

</html>