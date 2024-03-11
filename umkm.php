<?php
   /* error_reporting(1); nanti di value dijadikan 0 ketika web sudah fix */
   error_reporting(0);
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  };
  $idadmin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
  $ida = mysqli_fetch_array($idadmin);
  
  $product = mysqli_query($conn, "SELECT * FROM tb_product");
  $p = mysqli_fetch_array($product);

  $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE admin_id = '".$admin['admin_id']."'");
  $pr = mysqli_num_rows($product);
  
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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
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
    <div class="tengah">
      <div class="cari">
      <span class="material-symbols-outlined">search</span>
        <form action="umkm.php" >
          <input type="text" class="search" name="search" placeholder="" value="">
          <!--
          <select class="input-control" name="kategori" >
              <option value="">--pilih--</option>
              <?php
              $kategori = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY admin_id DESC");
              while($r= mysqli_fetch_array($kategori)){
              ?>
              <option value="<?php echo $r['category_name']?>" <?php echo ($r['category_name'] == $p['category_name'])? 'selected' : ''; ?>> <?php echo $r['category_name']?></option>
              <?php } ?>
            </select>
              -->
          <input type="submit" class="submit1" name="cari" value="Cari Produk">
        </form>
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
          <a href="#" class="active" class="aa">
              <span class="material-icons-sharp">inventory</span>
              <h3>Jelajahi UMKM</h3>
            </a>
          <a href="produk.php" class="aa">
            <span class="material-icons-sharp">receipt_long</span>
            <h3>Jelajahi Produk</h3>
          </a>
          <br>
          <div class="garis">
          <a href="report1.php" class="aa">
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
  
    <div class="inti1">
      <h1>UMKM</h1>
      <div class="umkma"> 
        <?php       
          if($_GET['search'] != ''){
            $where = "AND admin_name LIKE '%".$_GET['search']."%'";
             }

          $admin = mysqli_query($conn, "SELECT *  FROM tb_admin WHERE user_level = 1 $where ORDER BY admin_id DESC");
          if(mysqli_num_rows($admin) !== 0){
          while($ad = mysqli_fetch_array($admin)){    
          ?>
        <div>
        <a href="detail-umkm.php?id=<?php echo $ad['admin_id'] ?>">
        <div class="umkmb">
          <div class="umkmc">
            <img src="./assets/user/<?php echo $ad['admin_image'] ?>" alt="">
          </div>
          <div class="umkmd">
            <h1 class="textt"><?php echo $ad['admin_name']?></h1>
              <h2 style="  color: var(--color-font1);"><?php echo $pr ?> produk</h2>
              <h2 class="textt" style="color: var(--color-font); font-weight: 300;">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</h2>
          </div>       
        </div> 
        </a>  
        </div>     
        <?php }} else{ ?>
          <p>Product Tidak Ada</p>
        <?php } ?>              
        </div>
    </div>
    <!-- ------ END OF INSIGHT ------ -->   
  </main>
  </div>
  <script src="./1orders.js"></script>
  <script src="./1index.js"></script>
</body>
</html>