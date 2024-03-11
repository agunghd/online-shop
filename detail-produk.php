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
  
  <div class="prod">
    <div class="foto">
      <img src="./assets/user/user1709336709.jpg" alt="">
    </div>
    <div class="detprod">
      <h2>nama produk</h2>
      <h3>Rp. 150.000</h3>
    </div>
  </div>

  </main>

  <!-- -----END OF MAIN------ -->
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