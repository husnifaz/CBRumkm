<?php 
   ob_start();
   session_start();
  include "../../konek.php";
 ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/img/logo-ico2.png">

    <title>Silahkan Masuk</title>
    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" type="text/css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/mystyle.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <div class="container con-awal">
      <img src="../../assets/img/logo-ceo5.png" class="rounded mx-auto d-block" alt=".." width="200">
      <form class="form-signin" method="post" action="">
      <?php 
      if(isset($_POST['submit'])) {

        $uname=$_POST['email'];
        $pass=($_POST['sandi']);

        $cekuser="SELECT * FROM user WHERE email='$uname' AND pass='$pass'";
        $q_cekuser=mysql_query($cekuser) or die(mysql_error());
        $rowuser=mysql_fetch_row($q_cekuser);
        $iduser=$rowuser[0];

        if (mysql_num_rows($q_cekuser)>0){
          $_SESSION['user']=$uname;
          $_SESSION['login']=TRUE;
          $_SESSION['iduser']=$iduser;

          if ($rowuser[5]=='2') {

        ?>
          <script type="text/javascript" language="Javascript">
            alert('Login berhasil, Selamat datang..');
            document.location.href="../../?cbr";
          </script>
          <?php
          }
        else{
          ?>
          <script type="text/javascript" language="Javascript">
          alert('Maaf anda tidak bisa mengakses halaman ini');
          document.location.href="login.php";
        </script>
        <?php
          }
        } else { 
          ?>
          <div class="alert alert-danger" role="alert">
            <strong>Maaf!!</strong> Email atau sandi yang anda masukan salah, silahkan coba lagi.
        </div>
      <?php
        }
      }
       ?>
       
        <h2 class="form-signin-heading" style="text-align: center;">Silahkan Masuk</h2>
        <label for="inputEmail" class="sr-only">Alamat Email</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="E-mail" name="email" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Kata sandi" name="sandi" required>
       
        <input class="btn btn-lg btn-primary-login btn-block" type="submit" name="submit" value="Masuk">
        <p style="padding-top: 2rem;">Belum mempunyai akun ? <a href="signup.php">Daftar sekarang </a></p>
      </form>
     </div> <!-- /container -->
  </body>
</html>
