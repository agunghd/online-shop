<?php
  session_start();
  include'db.php';
  if($_SESSION['status_login'] != true){
      echo '<script>window.location="login.php"</script>';
  }

  $product = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id ='".$_GET['id']."'");
  if(mysqli_num_rows($product) == 0){
    echo '<script>window.location="data-produk.php"</script>';
  }
  $p = mysqli_fetch_object($product);
  
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
  <script src="https://cdn.ckeditor.com/4.24.0-lts/standard/ckeditor.js"></script>
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
        <h3>Edit Data Produk</h3>
        <div class="box">
          <form action="" method="POST" enctype="multipart/form-data">
            <select class="input-control" name="kategori" required>
              <option value="">--pilih--</option>
              <?php
              $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
              while($r= mysqli_fetch_array($kategori)){
              ?>
              <option value="<?php echo $r['category_id']?>" <?php echo ($r['category_id'] == $p->category_id)? 'selected' : ''; ?>> <?php echo $r['category_name']?></option>
              <?php } ?>
            </select>

            <input type="text" name="nama" class="input-control1" placeholder="Nama produk" value="<?php echo $p->product_name ?>" required>
            <input type="text" name="harga" class="input-control1" placeholder="Harga" value="<?php echo $p->product_price ?>" required>
            
            <img src="produk/<?php echo $p->product_image ?>" width="200px">
            <input type="hidden" name="foto" value="<?php echo $p->product_image?>">
            <input type="file" name="gambar" value="Submit" class="input-control1">
            <select class="input-control" name="status">
              <option value="">--Pilih--</option>
              <option value="1" <?php echo ($p->product_status == 1)? 'selected' : ''; ?>>Tersedia</option>
              <option value="0" <?php echo ($p->product_status == 0)? 'selected' : ''; ?>>Tidak Tersedia</option>
            </select>
            
            <input type="submit" name="submitproduct" value="Tambah Kategori" class="btn">
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
    <!-- Footer -->
    <footer>
      <div class="container">
        <small>Copyright &copy; 2024 Mahasiswa UNEJ.</small>
      </div>
    </footer>
    <script>
       CKEDITOR.replace( 'deskripsi' );
    </script>
</body>
</html>