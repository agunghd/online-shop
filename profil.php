<?php
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }
  $query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."'");
  $d = mysqli_fetch_object($query);

  $profil = mysqli_query($conn, "SELECT * FROM tb_admin ORDER BY admin_id");
  $p = mysqli_fetch_array($profil);

  $idadmin = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
  $ida = mysqli_fetch_array($idadmin);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive dashboard using css and JavaScritp</title>
  <!-- MATERIAL CDN -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
  
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp"
  rel="stylesheet">
  <!-- STYLE SHEET -->
  <link rel="stylesheet" href="1style.css">
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
      <button id="menu-btn" class="menu-btn">
        <span class="material-icons-sharp">menu</span>
      </button>
        <div class="logo">
          <img src="login/assets/img/logo13.png">
          <img src="login/assets/img/logo11.png">
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
            <img src="./assets/user/<?php echo $ida['admin_image']?>">
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
          <a href="dashboard.php"  class="aa">
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
  <h1>EDIT PROFIL</h1>

    <!-- form edit profil -->
      <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
            <p>Nama UMKM</p>
            <input type="text" name="nama" placeholder="Nama Lengkap" class="input-control" value="<?php echo $d->admin_name ?>" required>
            <input type="hidden" name="level" value="<?php echo $p['user_level'] ?>">
            <input type="hidden" name="foto" value="<?php echo $p['admin_image']?>">
            <p>Nama Pengguna (untuk login)</p>
            <input type="text" name="user" placeholder="Username" class="input-control" value="<?php echo $d->username ?>" required>
            <p>Nomor HP</p>
            <input type="text" name="hp" placeholder="No HP" class="input-control" value="<?php echo $d->admin_telp ?>" required>
            <p>Alamat Email</p>
            <input type="text" name="email" placeholder="Email" class="input-control" value="<?php echo $d->admin_email ?>" required>
            <p>Alamat UMKM</p>
            <input type="text" name="alamat" placeholder="Alamat" class="input-control" value="<?php echo $d->admin_address ?>" required>
            <p>Deskripsikan UMKM</p>
            <textarea type="text" name="comment" rows="4" cols="94%" style="background: var(--color-background); border-radius: var(--border-radius-3); color: var(--font-color);box-shadow:-3px -3px 7px rgba(94, 104, 121, 0.377),
            3px 3px 7px rgba(94, 104, 121, 0.377); padding: 10px;"><?php echo $d->admin_description?></textarea>
            <input type="hidden" name="level" placeholder="1">
            <input type="submit" style="cursor: pointer" name="submitpro" value="Ubah Profil" class="btn">
        </div>
  </main>
  <!-- -----END OF MAIN------ -->

  <?php
          if(isset($_POST['submitpro'])){

          $level = $_POST['level'];
          $nama   = ucwords($_POST['nama']);
          $user   = $_POST['user'];
          $hp     = $_POST['hp'];
          $email  = $_POST['email'];
          $alamat = ucwords($_POST['alamat']);
          $foto = $_POST['foto'];
          $deskripsi = ucwords($_POST['comment']);

          $filename = $_FILES['foato']['name'];
          $tmp_name = $_FILES['foato']['tmp_name'];


          $type1 = explode('.', $filename);
          $type2 = $type1[1];

          $newname = 'user' .time().'.'.$type2;

          // menampung data format file yang diinzinkan
          $type_diizinkan = array('jpg', 'jpeg', 'png');

          if($filename !=''){
            $type1 = explode('.', $filename);
            $type2 = $type1[1];
            $newname = 'user' .time().'.'.$type2;

          // validasi format file
          if(!in_array($type2, $type_diizinkan)){
            // jika format file tidak ada di dalam tipe diizinkan
            echo '<script> alert("Format file tidak diizinkan")</script>';      
          }else {
            echo 'Berhasil Upload';
            unlink('./assets/user/'.$foto);
            move_uploaded_file($tmp_name, './assets/user/' .$newname);
            $newprofil = $newname;
           }} else {
            $newprofil = $foto;     
            echo '<script>alert("gagal")</script>';
           }
            $update = mysqli_query($conn, "UPDATE tb_admin SET 
                      admin_name = '".$nama."',
                      admin_image ='".$newprofil."',
                      username = '".$user."',
                      admin_telp = '".$hp."',
                      admin_email = '".$email."',
                      admin_address = '".$alamat."',
                      admin_description = '".$deskripsi."'
                      WHERE admin_id = '".$d->admin_id."' ");
            if($update){
              echo '<script>alert("Ubah data berhasil")</script>';
              echo '<script>window.location="profil.php"</script>';
            }else{
              echo 'gagal'.mysqli_error($conn);
            }
          }
          ?>
  <div class="rigght">
  <div class="foto-p">
    <img src="./assets/user/<?php echo $p['admin_image']?>" style="margin:10px 3px; border-radius: 20px">
  </div>
  <p>Ubah Foto </p>
      <div class="center">
        <div class="form-input">
        <div class="preview">
          <img id="file-ip-1-preview">
        </div>
        <label for="file-ip-1">Pilih Foto </label>
            <input type="file" name="foato" id="file-ip-1"  onchange="showPreview(event);">         
            </form> 
        </div>
      </div>
    </div>

  </div>
  <script src="./1index.js"></script>
</body>
</html>