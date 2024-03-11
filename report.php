<?php
   /* error_reporting(1); nanti di value dijadikan 0 ketika web sudah fix */
   error_reporting(0);
  session_start();
  include'db.php';

  $idadmin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
  $ida = mysqli_fetch_array($idadmin);
  
$product = mysqli_query($conn, "SELECT * FROM tb_product");
$p = mysqli_fetch_array($product);

?>
<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive dashboard using css and JavaScritp</title>
  <!-- MATERIAL CDN -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
  rel="stylesheet">
  <!-- STYLE SHEET -->
  <link rel="stylesheet" href="1style.css">
</head>
<body>

<div class="head">
    <div class="top">
        <div class="logo">
          <img src="login/assets/img/logo13.png">
          <img src="login/assets/img/logo11.png">
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp">close</span>
        </div>
    </div>
      <div class="kanan">
        <div class="kanan1">
          <div class="top1">
          <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
          </div>
          </div>
        </div>
      </div>
  </div>
  <div class="containerr">
  <aside>
      <div class="sidebar">
        <br><br>
          <a href="index.php" class="aa">
              <span class="material-icons-sharp">dashboard</span>
              <h3>Beranda</h3>
            </a>
            <a href="login.php"  class="aa">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Login</h3>
            </a>
        <br>
        <div class="garis">
        <h3>CATALOG</h3>
            </a>
            <a href="umkm-f.php" class="aa">
              <span class="material-icons-sharp">inventory</span>
              <h3>Jelajahi UMKM</h3>
            </a>
            <a href="produk-f.php" class="aa">
              <span class="material-icons-sharp">receipt_long</span>
              <h3>Jelajahi Produk</h3>
            </a>
            <a href="#" class="activel" class="aa">
              <span class="material-icons-sharp">report_gmailerrorred</span>
              <h3>Laporkan</h3>
            </a>
        </div>
      </div>
    </aside>
     
    <!-- ------ MAIN ------- -->
  <main>
    <div style="margin-top: 3.4rem;">
      <iframe style="margin-left: 200px; border: none; oferflow-y: hidden;" src="https://docs.google.com/forms/d/e/1FAIpQLSd6z-XNsysRV0IWjXBvKdKpaMoKFkfMswtyDBCjCLw6KquSgw/viewform?embedded=true" width="640" height="1650" frameborder="0" marginheight="0" marginwidth="0"></iframe>
    </div>
  </main>
  </div>
  <script src="./1orders.js"></script>
  <script src="./1index.js"></script>
</body>
</html>