<?php
  session_start();
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
          <li><a href="profil.php">Profil</a></li>
          <li><a href="data-kategori.php">Data Ketegori</a></li>
          <li><a href="data-produk.php">Data Produk</a></li>
          <li><a href="keluar.php">Keluar</a></li>
        </ul>
      </div>
    </header>
    <!-- content -->
    <div class="section">
      <div class="container">
        <h3>Dashboard</h3>
        <div class="box">
          <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name?></h4>
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