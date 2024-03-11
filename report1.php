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
          <button id="menu-btn" class="menu-btn">
          <span class="material-icons-sharp">menu</span>
        </button>
          <div class="theme-toggler">
            <span class="material-icons-sharp active">light_mode</span>
            <span class="material-icons-sharp">dark_mode</span>
          </div>

      <div class="profile">
        <h3>Hey, <?php echo $ida['admin_name']?></h3>
        <small>Admin</small>
      </div>
      <div class="profile-photo">   
        <img src="./assets/user/<?php echo $ida['admin_image']?>">
      </div>
    </div>
          </div>
        </div>
      </div>
  <div class="containerr">
  <aside>
  <div class="sidebar">
        <br>
          <a href="dashboard.php"  class="aa">
              <span class="material-icons-sharp">dashboard</span>
              <h3>Beranda</h3>
          </a>
          <a href="profil.php" class="aa">
            <span class="material-icons-sharp">person_outline</span>
            <h3>Profil</h3>
          </a>
        <br>
        <div class="garis">
        <h3>CATALOG</h3>
        <a href="data-produk.php" class="aa">
            <span class="material-icons-sharp">add</span>
            <h3>Tambah Produk</h3>
          </a>
          <a href="umkm.php" class="aa">
              <span class="material-icons-sharp">inventory</span>
              <h3>Jelajahi UMKM</h3>
            </a>
          <a href="produk.php" class="aa">
            <span class="material-icons-sharp">receipt_long</span>
            <h3>Jelajahi Produk</h3>
          </a>
          <br>
          <div class="garis">
          <a href="#" class="active"  class="aa">
            <span class="material-icons-sharp">report_gmailerrorred</span>
            <h3>Laporkan</h3>
          </a>
          <a href="404/" class="aa">
            <span class="material-icons-sharp">settings</span>
            <h3>Pengaturan</h3>
          </a>
          <a href="keluar.php" class="aa">
            <span class="material-icons-sharp">logout</span>
            <h3>Logout</h3>
          </a>
          </div>
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
  <script src="./1index.js"></script>
</body>
</html>