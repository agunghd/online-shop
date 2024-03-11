<?php
   /* error_reporting(1); nanti di value dijadikan 0 ketika web sudah fix */
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="index2.php"</script>';
  };
  
  $idadmin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
  $ida = mysqli_fetch_array($idadmin);


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
<body id="theme">
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

      <div class="profile">
        <h3>Hey, <?php echo $ida['admin_name']?></h3>
        <small>Admin</small>
      </div>
      <div class="profile-photo">   
        <img src="assets/user/<?php echo $ida['admin_image']?>">
      </div>
    </div>
          </div>
        </div>
      </div>
  </div>
  <div class="container">
    <aside>
      <div class="sidebar">
      <br>
        <div class="close" id="close-btn" style="margin-left: 7rem; font-size: 10px;">
          <span class="material-icons-sharp">close</span>
        </div>
          <a href="#"  class="active" class="aa">
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
  <h1>UMKM Terpopuler</h1>
        <div class="umkm"> 
          <?php
            $user = mysqli_query($conn, "SELECT * FROM tb_admin WHERE user_level = 1 ORDER BY admin_id ASC LIMIT 3");
            if(mysqli_num_rows($user) > 0){
            while($u = mysqli_fetch_array($user)){
          ?>
            <div class="umkm-1">
              <a href="detail-umkm.php?id=<?php echo $u['admin_id']?>">
                <div class="isi">                
                <div class="middle1">
                  <img src="assets/user/<?php echo $u['admin_image']?>" alt="">      
                </div>
                <div class="middle2">
                  <h2><?php echo $u['admin_name'] ?></h2>
                  <h3><?php echo $u['admin_address']?></h3>
                  <h3><?php echo $u['admin_telp']?></h3>
                </div>
                </div>
              </a>
            </div>
                
          <?php }} else{ ?>
               <p>Product Tidak Ada</p>
          <?php } ?>
        </div>
        <h2>Produk Terbaru</h1>
      <div class="gallery">
      <span class="material-symbols-outlined" id="backBtn">arrow_back_ios</span>
        <div class="insight2"> 
          <?php
            $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 ORDER BY product_id DESC LIMIT 7");
            if(mysqli_num_rows($produk) > 0){
              while($p = mysqli_fetch_array($produk)){
          ?>
                  <div class="sales">
                  <a href="detail-produk.php?id=<?php echo $p['product_id']?>">
                    <div class="middles">
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
        <span class="material-symbols-outlined" id="nextBtn">arrow_forward_ios</span>
        </div>
        <a href="produk.php" class="shw" style="color: var(--color-font)">Show All</a>
    <!-- ------ END OF INSIGHT ------ -->   
  </main>

  <!-- -----END OF MAIN------ -->
  <div class="right">
      <a href="nib.php" class="">
        <div class="announcement">
          <h2>Ingin mengurusi NIB dan sertifikasi Halal untuk UMKM anda?</h2>
          <span class="material-symbols-outlined">login</span>
          <div class="ann">
            <h3>Kunjungi halaman ini</h3>
            <img src="111.png" alt="">
          </div>
        </div>
      </a> 
      <br>
      <div class="list-umkm">
        <h3>Umkm terakhir bergabung</h3>
        <?php
            $user = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY admin_id DESC LIMIT 4");
            if(mysqli_num_rows($user) > 0){
              while($u = mysqli_fetch_array($user)){
          ?>
        <a href="detail-umkm.php?id=<?php echo $u['admin_id'] ?>">
        <div class="lumkm">
          <img src="./assets/user/<?php echo $u['admin_image']?>" alt="">
          <div class="tumkm">
            <h3><?php echo $u['admin_name']?></h3>
            <h4><?php echo $u['admin_telp'] ?></h4>
          </div>
        </div>
        </a>
        <?php }} else{ ?>
               <p>Product Tidak Ada</p>
          <?php } ?>
        <a href="umkm.php" style="  display:flex;
  justify-content: center; color: var(--color-font);">Show All</a>
      </div>
    </div>
  </div>
  </div> 
  
  <script>
    let scrollContainer = document.querySelector(".insight2");
    let backBtn = document.getElementById("backBtn");
    let nextBtn = document.getElementById("nextBtn");

    scrollContainer.addEventListener("wheel", (evt) => {
        event.preventDefault();
        scrollContainer.scrollLeft += evt.deltaY;
        scrollContainer.style.scrollBehavior = "auto";
    });

    nextBtn.addEventListener("click", ()=>{
        scrollContainer.style.scrollBehavior = "smooth";
        scrollContainer.scrollLeft += 200;      
    });

    backBtn.addEventListener("click", ()=>{
        scrollContainer.style.scrollBehavior = "smooth";
        scrollContainer.scrollLeft -= 200;      
    });

  </script>
  <script src="./1index.js"></script>
</body>
</html>