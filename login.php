<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style2.css">
</head>
<body>
<div class="container" id="container">
	<div class="form-container sign-up-container">
		<form action="#">
    <div class="logo">
        <img src="./assets/images/logo13.png" alt="">
        <img src="./assets/images/logo11.png" alt="">
      </div>
			<h1>Buat Akun</h1>
			<input type="text" placeholder="Nama" />
			<input type="email" placeholder="Email" />
			<input type="password" placeholder="Kata Sandi" />
      <a href="https://wa.me/6281252718327?text=Halo%20admin,%20saya%20ingin%20mendaftarkan%20akun%20UMKM%20saya%20di%20webiste%20UMKM%20Antirogo" style="font-weight: bolder;">Klik di sini untuk hubungi admin!</a>
			<button id="myButton" style="cursor: pointer">Daftar</button>
		</form>
	</div>
	<div class="form-container sign-in-container">
		<form action="#" method="POST">
			<div class="logo">
        <img src="logo13.png" alt="">
        <img src="logo11.png" alt="">
      </div>
      <h1>Masuk</h1>
			<input type="text" name="user" placeholder="Email" />
			<input type="password" name="pass" placeholder="Password" />
			<a href="#">Lupa kata sandi?</a>
      <a href="user.php"><button href="user.php" type="submit" class="btnsend" name="submit" style="cursor: pointer">Masuk</button></a>
		</form>
    <?php
        if(isset($_POST['submit'])){
          session_start();
          include 'db.php';

          $user = mysqli_real_escape_string($conn, $_POST['user']);
          $pass = mysqli_real_escape_string($conn, $_POST['pass']);

          $cek = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '".$user."' AND password = '".MD5($pass)."'");
          if( mysqli_num_rows($cek) > 0){
            $d = mysqli_fetch_object($cek);
            $_SESSION['status_login'] = true;
            $_SESSION['a_global'] = $d;
            $_SESSION['id'] = $d->admin_id;
            echo '<script>window.location="dashboard.php"</script>' ;
          }else {
            echo '<Script>alert("Username atau password anda salah!")</script>';
          }
        }
        ?>
	</div>
	<div class="overlay-container">
		<div class="overlay">
			<div class="overlay-panel overlay-left">
				<h1>Sudah memiliki akun?</h1>
				<p>Ayo masuk di sini</p>
				<button class="ghost" id="signIn" style="cursor: pointer">Masuk</button>
			</div>
			<div class="overlay-panel overlay-right">
				<h1>Belum memiliki Akun?</h1>
				<p>Ayo daftarkan UMKM anda sekarang!</p>
				<button class="ghost" id="signUp" style="cursor: pointer">Daftar</button>
			</div>
		</div>
	</div>
</div>
<script src="1.js"></script>
<script>
  const button = document.getElementById('myButton');
  button.addEventListener('click', function() {
    alert('Hubungi Admin Untuk Mendaftar!');
  });
</script>
</body>
</html>