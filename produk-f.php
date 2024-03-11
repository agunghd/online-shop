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
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

  <link rel="stylesheet" href="1style.css">
</head>
<body>
  
<div class="head">
    <div class="top">
      <button id="menu-btn" class="menu-btn">
        <span class="material-icons-sharp">menu</span>
      </button> 
        <div class="logo">
          <img src="login/assets/img/logo13.png">
          <img src="login/assets/img/logo11.png">
        </div>

    </div>
    <div class="tengah">
      <div class="cari">
      <span class="material-symbols-outlined">search</span>
        <form action="produk-f.php" >
          <input type="text" class="search" name="search" placeholder="" value="">
          <!--
          <select class="input-control" name="kategori" >
              <option value="">--pilih--</option>
              <?php
              $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
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
            <a href="#" class="active" class="aa">
              <span class="material-icons-sharp">receipt_long</span>
              <h3>Jelajahi Produk</h3>
            </a>
            <a href="report.php" class="aa">
              <span class="material-icons-sharp">report_gmailerrorred</span>
              <h3>Laporkan</h3>
            </a>
        </div>
      </div>
    </aside>
     
    <!-- ------ MAIN ------- -->
  <main>
      <div class="isit">
        <h1>Produk Terbaru</h1>
        <div class="insight1"> 
        <?php       
          if($_GET['search'] != '' || $_GET['kategori'] !== ''){
          $where = "AND product_name LIKE '%".$_GET['search']."%' AND category_name LIKE '%".$_GET['kategori']."%'";
           }
          $produk = mysqli_query($conn, "SELECT *  FROM tb_product WHERE product_status = 1 $where ORDER BY product_id DESC");
          if(mysqli_num_rows($produk) !== 0){
          while($p = mysqli_fetch_array($produk)){
          ?>
          <div class="sales">
            <a href="detail-produk.php?id=<?php echo $p['product_id']?>">
              <div class="middle">
                <div class="left">
                  <img src="./assets/produk/<?php echo $p['product_image'] ?>" alt="">  
                    <div class="desproduk">
                      <p><?php echo $p['product_name'] ?></p>
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
        <a href="produk-f.php" class="shw" style="color: var(--color-font-1); margin: 10px;">Show All</a>
      </div>
    <!-- ------ END OF INSIGHT ------ -->   
  </main>
  </div>
  <script src="./1orders.js"></script>
  <script src="./1index.js"></script>
</body>
</html>