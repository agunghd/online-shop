<?php 
  error_reporting(1); /* nanti di value dijadikan 0 ketika web sudah fix */
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="style.css">
    <meta name="viewport" content="with=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;600;700&display=swap" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <title>Login ML</title>
  </head>
  <body>
    <section class="header">
      
      <div class="maincont">
        <div class="left-image">
          <img src="assets/login1.png" alt="">
        </div>
        <div class="loginbox">

            <img src="login/assets/img/logo13.png" alt="Logo desa">
            <img src="login/assets/img/logo11.png" alt="Logo desa">
          <h2>Login</h2>
          
          <!-- login-->
          <p>Gunakan Akun anda</p>
            <form action=""  method="POST">
                <input type="text" name="user" placeholder="Username" ><br><br>
                <input type="password" name="pass" placeholder="Password"><br>
                <h3><a class="a1" href="#">Lupa Password?</a></h3>
                <h4>Bukan Komputer Anda? Gunakan Private Windows untuk Login<switch><a href=""> pelajari lebih lanjut</a></switch></h4>
                <h5><a href="1buatprofil.php">Buat akun</a>
                <a href="user.php"><Input type="submit" class="btnsend" name="submit" Value="Masuk"></Input></a>
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
            echo '<script>window.location="user.php"</script>' ;
          }else {
            echo '<Script>alert("Username atau password anda salah!")</script>';
          }
        }
        ?>
        </div>
    </div>
    </section>
    
   
  </body>
</html>