<?php
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_name, admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 12");
    $a = mysqli_fetch_object($kontak);

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
<body>
  <div class="container">
    <aside>
      <div class="top">
        <div class="logo">
          <img src="login/assets/img/logo13.png">
          <img src="login/assets/img/logo11.png">
        </div>
        <div class="close" id="close-btn">
          <span class="material-icons-sharp">close</span>
        </div>
      </div>
      <div class="sidebar">
      <a href="user.php" class="aa">
              <span class="material-icons-sharp">dashboard</span>
              <h3>Beranda</h3>
            </a>
            <a href="profil.php"  class="aa">
              <span class="material-icons-sharp">person_outline</span>
              <h3>Profil</h3>
            </a>
            <a href="data-produk.php" class="aa">
              <span class="material-icons-sharp">add</span>
              <h3>Tambah Produk</h3>
            </a>
            <a href="404/" class="aa">
              <span class="material-icons-sharp">inventory</span>
              <h3>Jelajahi UMKM</h3>
            </a>
            <a href="produk.php" class="aa">
              <span class="material-icons-sharp">receipt_long</span>
              <h3>Jelajahi Produk</h3>
            </a>
            <a href="404/" class="aa">
              <span class="material-icons-sharp">report_gmailerrorred</span>
              <h3>Laporkan</h3>
            </a>
            <a href="" class="aa">
              <span class="material-icons-sharp">settings</span>
              <h3>Pengaturan</h3>
            </a>
            <a href="keluar.php" class="aa">
              <span class="material-icons-sharp">logout</span>
              <h3>Logout</h3>
            </a>
      </div>
    </aside>
     
    <!-- ------ MAIN ------- -->
    <main>
    <div class="header">
      <div class="kiri"><h1>Beranda</h1>
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
    <div class="layanan">
      <div class="layanan-nib">
        <div class="nib">
          <h2>Persyaratan Mengurus NIB</h1>
          <p>
            Persyaratan Mengurus Nomor Induk Berusaha (NIB) Bagi Pelaku Usaha Mikro, Kecil dan Menengah :<br><br>

            1. KTP<br>
            2. NPWP Badan atau Perorangan<br>
            3. Akta Pendirian<br>
            4. Izin Lokasi, IMB dan AMDAL<br>
            5. Dokumen Pendukung Lainnya yaitu Nomor BPJS dan Notifikasi Kelayakan Mendapat Fasilitas Fiskal
          </p>
        </div>
        <div class="nib">
          <h2>Persyaratan Mengurus sertifikasi Halal</h1>
          <p>
          1. Data Pelaku Usaha<br>
          Pada proses penerbitan sertifikasi halal BPJPH (Badan Penyelenggara Jaminan Produk Halal) membutuhkan data para pelaku usaha. Data tersebut terdiri atas NIB atau Nomor Induk Berusaha. 
          <br>
          Meskipun demikian, jika Anda tidak mempunyai NIB, Anda dapat  membuktikannya dengan data lainnya seperti NPWP (Nomor Pokok Wajib Pajak), SIUP (Surat Izin Usaha Perdagangan), NKV (Nomor Kontrol Veteriner), IUMK (Izin Usaha Mikro dan Kecil) ataupun IUI (Izin Usaha Industri). 
          <br>
          Penyelia halal juga membutuhkan salinan KTP (Kartu Tanda Penduduk), salinan sertifikat penyelia halal, daftar riwayat hidup, dan salinan keputusan penetapan penyelia halal sebagai salah satu syarat pengajuan sertifikasi halal. 
          <br><br>
          2. Nama dan Jenis Produk<br>
          Pelaku usaha wajib memiliki nama dan jenis produk sesuai dengan nama dan jenis produk yang akan disertifikasi halal.
          <br><br>
          3. Daftar Produk, Bahan dan Pengolahan<br>
          Semua jenis bahan baku dan pengolahan juga wajib dilampirkan untuk memenuhi syarat sertifikasi halal. Pelaku usaha juga harus melampirkan proses pengolahan produk yang terdiri atas pembelian, penerimaan, penyimpanan bahan, pengolahan, pengemasan, penyimpanan produk hingga distribusi produk.  
          <br>
          Bahan-bahan yang digunakan produk juga harus bersifat halal, baik bahan baku, bahan tambahan atau pelengkap, maupun bahan kemasan primer.
          <br>
          Selain itu, pelaku usaha juga harus dapat menjamin bahwa produk tidak terkontaminasi dari bahan haram atau kotor (najis) pada proses produksi atau fasilitasnya.
          <br><br>
          4. Dokumen Sistem Jaminan Halal<br>
          Setiap pelaku usaha harus memiliki dokumen sistem jaminan halal. Hal ini penting untuk dilakukan dalam menjaga kesinambungan proses produksi halal. 
          </p>
        </div>
      </div>
      <a href="https://wa.me/6281252718327?text=Halo%20admin,%20saya%20ingin%20mendaftarkan%20NIB%20UMKM%20saya"><div class="kontak">
        <h2>Untuk mengurusi NIB dan sertifikasi Halal dapat menghubungi admin</h2>
        <h3>Klik di sini</h3>
        <br>
        <span class="material-symbols-outlined">login</span>
        <img src="111.png" alt="">
      </div>
      </a>
    </div>
    <!-- ------ END OF INSIGHT ------ -->   
  </main>
  </div>
  </div> 
  </script>
</body>
</html>