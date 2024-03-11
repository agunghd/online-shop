<?php
  session_start();
  include'db.php';

  $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id ='".$_GET['id']."'");
  if(mysqli_num_rows($product) == 0){
    echo '<script>window.location="data-produk.php"</script>';
  }
  $p = mysqli_fetch_array($product);
  ?>

<!DOCTYPE html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive dashboard using css and JavaScritp</title>
  <!-- MATERIAL CDN -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
  <link href="https://fonts.googleapis.com/icon?family=Material+Symbols+Outlined" rel="stylesheet">
  
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
        <form action="produk-f.php" class="srch">
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
          <input type="submit" class="submit1" name="cari" value="Cari">
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
<div class="container1">  
<aside>
      <div class="sidebar">
        <br>
          <a href="dashborad.php" class="aa">
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
        <a href="data-produk.php" class="active" class="aa">
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
      
      

    <div class="section">
      <div class="containerp">
        <h2>Edit Data Produk</h2>
        <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
            <select class="input-control" name="kategori" required>
              <option value="">--pilih--</option>
              <?php
              $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
              while($r= mysqli_fetch_array($kategori)){
              ?>
              <option value="<?php echo $r['category_id']?>" <?php echo ($r['category_id'] == $p['category_id'])? 'selected' : ''; ?> <?php echo $r['category_name']?></option>
              <?php } ?>
            </select>

            <input type="text" name="nama" class="input-control" placeholder="Nama produk" value="<?php echo $p['product_name'] ?>" required>
            <input type="text" name="harga" class="input-control" placeholder="Harga" value="<?php echo $p['product_price'] ?>" required>
            
            <img src="./assets/produk/<?php echo $p['product_image'] ?>" width="200px">
            <input type="hidden" name="foto" value="<?php echo $p['product_image']?>">
            <input style="border: none;" type="file" name="gambar" value="Submit" class="input-control">
            <textarea style="height: 100px" type="input" class="input-control" name="deskripsi" placeholder="Deskripsi"><?php echo $p['product_description']?></textarea>
            <select class="input-control" name="status">
              <option value="">--Pilih--</option>
              <option value="1" <?php echo ($p['product_status'] == 1)? 'selected' : ''; ?>>Tersedia</option>
              <option value="0" <?php echo ($p['product_status'] == 0)? 'selected' : ''; ?>>Tidak Tersedia</option>
            </select>
            
            <input type="submit" name="submitproduct" value="Ubah Data Produk" class="btn1"  >
          </form>  
          <?php
          if(isset($_POST['submitproduct'])){

            // data inputan dari form
              $kategori   = $_POST['kategori'];
              $nama       = $_POST['nama'];
              $harga      = $_POST['harga'];
              $deskripsi  = $_POST['deskripsi'];
              $status     = $_POST['status'];
              $foto       = $_POST['foto'];

            // data gambar yang baru
              $filename = $_FILES['gambar']['name'];
              $tmp_name = $_FILES['gambar']['tmp_name'];

              $type1 = explode('.', $filename);
              $type2 = $type1[1];

              $newname = 'produk' .time().'.'.$type2;

            //menampung data format file yang diizinkan
            $type_diizinkan = array('jpg', 'jpeg', 'png');


            // jika admin ganti gambar
              if($filename !=''){
                $type1 = explode('.', $filename);
                $type2 = $type1[1];
  
                $newname = 'produk' .time().'.'.$type2;
  
              //menampung data format file yang diizinkan
              $type_diizinkan = array('jpg', 'jpeg', 'png');


                  //validasi fortmat file
                  if(!in_array($type2, $type_diizinkan)){
                    // jika format file tidak ada di dalam tipe diizinkan
                    echo '<script> alert("Format file tidak diizinkan")</script>';
                  
                  }else{
                    unlink('./Produk/'.$foto);
                    move_uploaded_file($tmp_name, './Produk/' .$newname);
                    $namagambar = $newname;
                  }}
                else{
                  // jika admin tidak ganti gambar
                  $namagambar = $foto;

              }


                // query update data produk

                $update = mysqli_query($conn, "UPDATE tb_product SET
                          category_id = '".$kategori."',
                          product_name = '".$nama."',
                          Product_price = '".$harga."',
                          product_description = '".$deskripsi."',
                          product_image = '".$namagambar."',
                          product_status = '".$status."'
                          WHERE product_id = '".$p->product_id."' ");

                if($update){
                  echo' <script>alert("Ubah data berhasil")</Script>';
                  echo' <script>window.location="data-produk.php"</Script>';
                } else {
                  echo 'gagal' .mysqli_error($conn);
                }

          }
          
          ?>
           
           

          
        </div>
      </div>
    </div>

</body>
</html>