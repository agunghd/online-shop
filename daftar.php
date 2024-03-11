<?php
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }

  $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
  $d = mysqli_fetch_object($query);
?>

<!DOCTYPE html>
<html lang="en">
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

  <!-- preview foto -->

  <script> 
                function showPreview(event){
                  if(event.target.files.length > 0){
                  var src = URL.createObjectURL(event.target.files[0]);
                  var preview = document.getElementById("file-ip-1-preview");
                  preview.src = src;
                  preview.style.display = "block";
                }}
            </script>
  
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
        </div>
      </div>
    </div>
  </div>

  <div class="container2">
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
  <main >
    <h1>Buat Akun Baru</h1>
    <!-- form edit profil -->
      <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
          <p>Nama UMKM</p>
            <input type="text" name="nama" placeholder="Cth. Agung Hidayatullah" class="input-control" >
            <p>Nama Pengguna (untuk login)</p>
            <input type="text" name="user" placeholder="Cth. Agung" class="input-control" required>
            <p>Kata Sandi </p>
            <input type="text" name="pass" placeholder="Buat Kata Sandi yang Unik" class="input-control" required>
            <p>Nomor Hp</p>
            <input type="text" name="hp" placeholder="Cth. 081252718327" class="input-control" >
            <p>Alamat Email</p>
            <input type="text" name="email" placeholder="Cth. agunghd46@gmail.com" class="input-control" >
            <p>Alamat UMKM anda</p>
            <input type="text" name="alamat" placeholder="Cth. Jl. Raya Pujer, Kab. Bondowoso, JATIM" class="input-control" >
            <p>Deskripsikan UMKM anda</p>
            <textarea type="text" name="comment" rows="4" cols="86%" style="background: var(--volor-background2); border-radius: var(--border-radius-3); color: var(--font-color);box-shadow:-3px -3px 7px rgba(94, 104, 121, 0.377),
            3px 3px 7px rgba(94, 104, 121, 0.377); padding: 10px;"></textarea>
            <input type="hidden" name="level" placeholder="1">
            <input type="submit" name="submitsp" value="Buat Akun" class="btn" style="cursor: pointer;">           
        </div>   
  </main>

  <div class="rigght">
    <p>Tambahkan Foto </p>
      <div class="center">
        <div class="form-input">
        <div class="preview">
          <img id="file-ip-1-preview">
        </div>
        <label for="file-ip-1">Pilih Foto </label>
            <input type="file" name="foto" id="file-ip-1"  onchange="showPreview(event);">         
  
        </div>

        <?php
            if(isset($_POST['submitsp'])){
              
              // print_r($_FILES['gambar']);
              // menampung inputan dari form
            $level = 1;
            $nama   = ucwords($_POST['nama']);
            $user   = $_POST['user'];
            $pass   = $_POST['pass'];
            $hp     = $_POST['hp'];
            $email  = $_POST['email'];
            $alamat = ucwords($_POST['alamat']);
            $deskripsi = ucwords($_POST['comment']);


              // menampung data file yang diupload

              $filename = $_FILES['foto']['name'];
              $tmp_name = $_FILES['foto']['tmp_name'];


            $type1 = explode('.', $filename);
            $type2 = $type1[1];

            $newname = 'user' .time().'.'.$type2;

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
             move_uploaded_file($tmp_name, './assets/user/' .$newname);


             $insert = mysqli_query($conn, "INSERT INTO tb_admin VALUES (
              null, 
              '".$level."',
              '".$nama."',
              '".$newname."',
              '".$user."',
              '".MD5($pass)."',
              '".$hp."',
              '".$email."',
              '".$alamat."',
              '".$deskripsi."'
              )");
    
              if($insert){
                echo' <script>alert("Tambah data berhasil")</Script>';
                echo' <script>window.location="daftar.php"</Script>';
              } else {
                echo 'gagal' .mysqli_error($conn);
              }}
          ?>
                    </form>
      </div>
  </div>

  </div>
  </div>
</body>
</html>