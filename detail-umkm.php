<?php
   /* error_reporting(1); nanti di value dijadikan 0 ketika web sudah fix */
   error_reporting(0);
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  };
  $umkm = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_GET['id']."'");
  if(mysqli_num_rows($umkm) == 0){
    echo '<script>window.location="umkm.php"</script>';
  }

  $um = mysqli_fetch_object($umkm);

  $umkmk = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_GET['id']."'");
  $umk = mysqli_fetch_array($umkmk);

  $idadmin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
  $ida = mysqli_fetch_array($idadmin);
  
  $product = mysqli_query($conn, "SELECT * FROM tb_product");
  $p = mysqli_fetch_array($product);

/*
  $admin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id ='".$_GET['id']."'");
  if(mysqli_num_rows($admin) == 0){
    echo '<script>window.location="umkm.php"</script>';
  }
*/
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
          <a href="user.php"  class="aa">
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
    <div class="content">
      <div class="banner">
        <img src="./assets/images/banner4.jpg" alt="">
      </div>
      <div class="about-umkm">
        <div class="infor">
          <div class="pp">
            <img src="./assets/user/<?php echo $umk['admin_image'] ?>" alt="logo umkm">
          </div>
        <h1><?php echo $umk['admin_name'] ?></h1>
        </div>
          <div class="bhub">
          <a href="https://wa.me/<?php echo $umk['admin_telp'] ?>?text=Hallo%20<?php echo $umk['admin_name'] ?>,%20saya%20tertarik%20dengan%20roduk%20Anda%20">
            <div class="hub">
              <img src="./assets/images/wa.png" alt="">
              <h2>Hubungi di Sini</h2>
            </div>
          </a>
          </div>
      </div>
      <div class="iumkm">
        <div class="iprod">
          <div class="idesc">
            <h2><?php echo $umk['admin_description']?></h2>
          </div>
          <br>
          <div class="garis"></div>
          <div class="insight3"> 
        <?php       
          if($_GET['search'] != '' || $_GET['kategori'] !== ''){
          $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_name LIKE '%".$_GET['kategori']."%'";
           }
          $produk = mysqli_query($conn, "SELECT *  FROM tb_product WHERE product_status = 1 AND admin_id = $um->admin_id $where ORDER BY product_id DESC");
          if(mysqli_num_rows($produk) !== 0){
          while($p = mysqli_fetch_array($produk)){
          ?>
          
                  <div class="sales">
                  <a href="detail-produk.php?id=<?php echo $p['product_id']?>">
                    <div class="middle">
                      <div class="left">
                        <img src="./assets/produk/<?php echo $p['product_image'] ?>" alt="">  
                          <div class="desproduk">
                            <p><?php echo $p['product_name']?></p>
                            <p1>Rp. <?php echo number_format($p['product_price']) ?></p1>
                            <img src="./assets/images/cod.png" alt="" style="width:21px">
                            <div class="nama-umkm">
                              <img class="location" src="./assets/images/store1.png" alt="">
                              <p>Nama UMKM</p>
                            </div>
                            <p2>Alamat UMKM</p2>

                          </div>
                      </div>
                      
                    </div>
                    </a>
                  </div>    
                  <?php }} else{ ?>
               <p>Product Tidak Ada</p>
          <?php } ?>              


        </div>
        </div>

      </div>
    </div>           
    <!-- ------ END OF INSIGHT ------ -->   
  </main>
  </div>
  <script src="./1orders.js"></script>
  <script src="./1index.js"></script>
</body>
</html>