<?php 
  include "konek.php";
  session_start();
  error_reporting(0);
  $s_name=$_REQUEST['cbr'];
  switch ($pageload){
    case 'form':
     $title="Form Pengisian Kriteria";
    break;
    case 'submit-krit':
     $title="Hasil Perbandingan Dengan Kasus Terdahulu";
    break;

    default:
      $title="APLIKASI CBR UNTUK UMKM TELEKOMUNIKASI";
    break;
  }
    
 ?>

<!doctype html>
<html lang="en">
  <head>
    <title><?php echo $title ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./assets/css/mystyle.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/all.min.css">

    <link rel="icon" href="./assets/img/logo-ico2.png">
   
  </head>
  <body>
   <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand mb-0 h1" href="?cbr">
    <img src="./assets/img/logo-ceo4.png" width="85" height="50">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
       <?php error_reporting(0); $page=$_REQUEST['cbr']; $active='active'; ?>
      <li class="nav-item <?php if($page==''){echo $active;}?>">
        <a class="nav-link" href="?cbr">Beranda <span class="sr-only"></span></a>
      </li>
      <li class="nav-item <?php if($page=='form'){echo $active;}?>">
        <a class="nav-link" href="?cbr=form">Form Kriteria</a>
      </li>
       <li class="nav-item">
         <a class="nav-link" href="?cbr=tentang">Tentang Kami</a>
      </li>
     <!--  <li class="nav-item dropdown <?php if($page=='d'||$page=='s'){echo $active;}?>">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Lainnya
        </a>
      <li class="nav-item">
        <a class="nav-link" href="?cbr=form">Form Kriteria</a>
      </li>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown"> -->
         <!--  <a href="?cbr=masukan" class="dropdown-item">Kirim Masukan & laporan</a>
          <div class="dropdown-divider"></div> -->
         
        </div>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
       
        <?php 
          if (isset($_SESSION['user']) && isset($_SESSION['login'])) {

          $namaakun=mysql_query("SELECT * FROM user WHERE email='".$_SESSION['user']."'") or die(mysql_error());
          while ($cek_akun=mysql_fetch_array($namaakun)) {
          $nmakun=$cek_akun['nama'];
          }  
          $_SESSION['nmakun']=$nmakun;        
          if (mysql_num_rows($namaakun)>0) {  
              echo "<li class='nav-item dropdown'>
                          <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' 
                          data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> 
                          ".$nmakun."</a>
                          <div class='dropdown-menu dropdown-menu-right' aria-labelledby='navbarDropdown'>
                            <a class='dropdown-item' href='?cbr=riwayat'>Profil Saya</a>
                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='./pages/log/logout.php''>Logout</a>
                          </div>
                        </li>";
          }}
          else{
            echo "<li class='nav-item'>
                    <a class='nav-link' href='./pages/log/login.php'>Login</a>
                  </li>";
          } 
          ?>
      </li>
    </ul>
  </div>
</nav>

<main role="main">

    <?php 
      if (isset($_GET['cbr'])) {
        $pageload=$_GET['cbr'];
      }else{
        $pageload="home";
      }
      switch ($pageload) {
        case 'form':
          include "./pages/form/form.php";
          break;
        case 'valid':
          include "./pages/form/insert.php";
          break;
        case 'submit-krit':
          include "./pages/form/submit_krit.php";
          break;
        case 'modol':
          include "openmodal.php";
          break;
        case 'tambah-kategori':
          include "./pages/form/insert_modal.php";
          break;
        case 'riwayat':
          include "./pages/hasil/list_riwayat.php";
          break;
        case 'masukan':
          include './pages/awal/feedback.php';
          break;
        case 'insert-masukan':
          include './pages/awal/insert_feedback.php';
          break;
        case 'tentang':
          include './pages/awal/about.php';
          break;
        default:
         include "./pages/awal/utama.php";
          break;
      }


     ?>
     
      <hr class="featurette-divider">
      <footer class="container bottom-con">
        <p align="center">&copy; Muhammad Husni Farid &middot; 065114343 <br>Ilmu Komputer &middot; FMIPA &middot; Universitas Pakuan <br>2018</p>
      </footer>
</main>

</body>

 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
  <!-- <script src="./assets/js/core/popper.min.js" type="text/javascript"></script> -->
  <script src="./assets/js/bootstrap.min.js" type="text/javascript"></script>

</html>