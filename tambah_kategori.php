<?php
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>UMKM</title>
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
    <header>
      <div class="container">
        <h1><a href="dashboard.php">UMKM</a></h1>
        <ul>
          <li><a href="dashboard.php">Dashboard</a></li>
          <li><a href="profil.php"></a>Profil</li>
          <li><a href="data-kategory.php">Data Ketgory</a></li>
          <li><a href="data-produk.php">Data Produk</a></li>
          <li><a href="keluar.php">Keluar</a></li>
        </ul>
      </div>
    </header>
    <!-- content -->
    <div class="section">
      <div class="container">
        <h3>Tambah Kategori</h3>
        <div class="box">
          <form action="" method="POST">
            <input type="text" name="nama" placeholder="Kategori" class="input-control" required>
            <input type="submit" name="submitkategori" value="Tambah Kategori" class="btn">
          </form>  
          <?php
            if(isset($_POST['submitkategori'])){
              
              $submitkategori = $_POST['nama'];

              $update = mysqli_query($conn, "INSERT INTO tb_category VALUES (
                null,
                '".$submitkategori."') ");
            if($update){
              echo '<script>alert("Ubah data berhasil")</script>';
              echo '<script>window.location="data-kategori.php"</script>';
            }else{
              echo 'gagal'.mysqli_error($conn);
            }
          }

          ?>
        </div>
      </div>
    </div>
    <!-- Footer -->
    <footer>
      <div class="container">
        <small>Copyright &copy; 2024 Mahasiswa UNEJ.</small>
      </div>
    </footer>
</body>
</html>