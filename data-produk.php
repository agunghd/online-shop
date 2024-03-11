
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
        <a href="data-produk.php" class="active"  class="aa">
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
     
    <main>
      <div class="section">
      <h3>Produk</h3>
      <div class="box">
        <table border="1" cellspacing="0" class="tabel" rules="all">
          <thead>
            <tr class="mati">
              <th width="30px">No</th>
              <th>Kategori</th>
              <th>Nama Produk</th>
              <th>Harga</th>
              <th>Deskripsi</th>
              <th>Gambar</th>
              <th>Ststus</th>
              <th width="100px">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $no = 1;
            $produk = mysqli_query($conn, "SELECT * FROM tb_product  LEFT JOIN tb_category USING (category_name) ORDER BY product_id DESC");
            if(mysqli_num_rows($produk) > 0){      
            while($row = mysqli_fetch_array($produk)){        
            ?>
            <tr>
              <td><?php echo $no++ ?></td>
              <td><?php echo $row['category_name']?></td>
              <td><?php echo $row['product_name']?></td>
              <td>Rp. <?php echo number_format($row['product_price'])?></td>
              <td class="textt"><?php echo $row['product_description']?></td>
              <td style="align-items: center;"><a href="./assets/produk/<?php echo $row['product_image'] ?>" target="_blank"><img src="./assets/produk/<?php echo $row['product_image'] ?>" width="50px"> </a></td>
              <td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif' : 'Aktif'; ?></td>             
              <td>
                <a href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edit</a> || <a href="proses-hapus.php?idp=<?php echo $row ['product_id'] ?>" onclick="return confirm('Yakin ingin hapus')" >Hapus</a>
              </td>
            </tr>
            <?php }}else { ?>
              <tr>
              <td colspan="8">Tidak ada data</td>
              </tr>
              
            <?php } ?>
          </tbody>
        </table>
      </div>
      <p><a href="tambah-produk.php" class="btn4">Tambah Produk</a></p>
    </div>
  </div>
  <!-- -----END OF MAIN------ -->
  
  </div>
</body>
</html>