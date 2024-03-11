
<?php
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
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
            <img src="./user/<?php echo $ida['admin_image']?>">
          </div>
        </div>
      </div>
    </div>
</div>
  <div class="container1">
  <aside>
      <div class="sidebar">
        <br>
          <a href="user.php"  class="aa">
              <span class="material-icons-sharp">dashboard</span>
              <h3>Beranda</h3>
          </a>
          <a href="#" class="active" class="aa">
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
          <a href="" class="aa">
              <span class="material-icons-sharp">inventory</span>
              <h3>Jelajahi UMKM</h3>
            </a>
          <a href="produk.php" class="aa">
            <span class="material-icons-sharp">receipt_long</span>
            <h3>Jelajahi Produk</h3>
          </a>
          <br>
          <div class="garis">
          <a href="404/" class="aa">
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
     
    <main>
      <div class="section">
      <h3>Produk</h3>
      <!-- content -->
    <div class="section">
      <div class="container">
        <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
            <select class="input-control" name="kategori" required>
              <option value="">--pilih--</option>
              <?php
              $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
              while($r= mysqli_fetch_array($kategori)){
              ?>
              <option value="<?php echo $r['category_id']?>"><?php echo $r['category_name']?></option>
              <?php } ?>
            </select>

            <input type="text" name="nama" class="input-control" placeholder="Nama produk" required>
            <input type="text" name="harga" class="input-control" placeholder="Harga" required>
            <input type="file" name="gambar" value="Submit" class="input-control">
            <textarea type="input" class="input-control" name="deskripsi1" placeholder="Deskripsi"></textarea>
            <select class="input-control" name="status">
              <option value="">--Pilih--</option>
              <option value="1">Tersedia</option>
              <option value="0">Tidak Tersedia</option>
            </select>
            
            <input type="submit" name="submitkategori" value="Tambah Kategori" class="btn">
          </form>  
          <?php
            if(isset($_POST['submitkategori'])){
              
              // print_r($_FILES['gambar']);
              // menampung inputan dari form
              $kategori   = $_POST['kategori'];
              $nama       = $_POST['nama'];
              $harga      = $_POST['harga'];
              $deskripsi  = $_POST['deskripsi1'];
              $status     = $_POST['status'];

              // menampung data file yang diupload

              $filename = $_FILES['gambar']['name'];
              $tmp_name = $_FILES['gambar']['tmp_name'];

              $type1 = explode('.', $filename);
              $type2 = $type1[1];

              $newname = 'produk' .time().'.'.$type2;

              // menampung data format file yang diinzinkan
              $type_diizinkan = array('jpg', 'jpeg', 'png');

              // validasi format file
              if(!in_array($type2, $type_diizinkan)){
                // jika format file tidak ada di dalam tipe diizinkan
                echo '<script> alert("Format file tidak diizinkan")</script>';
               
              }else {
                echo 'Berhasil Upload';
               }

               // jika format file sesuai dengan araay tipe diizinkan
              // proses upload file sekaligus insert ke database
               move_uploaded_file($tmp_name, './Produk/' .$newname);

               $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                        null,
                        '".$kategori."',
                        '".$nama."',
                        '".$harga."',
                        '".$deskripsi."',
                        '".$newname."',
                        '".$status."',
                        null    
                            ) ");
              
              if($insert){
                echo' <script>alert("Tambah data berhasil")</Script>';
                echo' <script>window.location="data-produk.php"</Script>';
              } else {
                echo 'gagal' .mysqli_error($conn);
              }
              

     


          }

          ?>
        </div>
      </div>
    </div>
      <p><a href="tambah-produk.php" class="btn4">Tambah Produk</a></p>
    </div>
  </div>
  <!-- -----END OF MAIN------ -->
  
  </div>
</body>
</html>