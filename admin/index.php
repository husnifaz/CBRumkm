<?php 
  include "../konek.php";
  session_start();
  header('Location : ?q=0');

  error_reporting(0);
    if (isset($_SESSION['useradmin']) && isset($_SESSION['loginadmin'])) {

      $cekuser="SELECT * FROM user WHERE email='".$_SESSION['useradmin']."'";
      $q_cekuser=mysql_query($cekuser)or die(mysql_error());
    if (mysql_num_rows($q_cekuser)>0) {
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CBUMKM Admin</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="icon" href="../assets/img/logo-ico2.png">

    <link rel="stylesheet" href="assets/css/normalize.css">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="assets/scss/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/fontstyle.css">

    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body>
     <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="./?q=0"><strong>CBUMKM</strong>&nbsp;Admin</a>
                <a class="navbar-brand hidden" href="./">A</a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="./?q=0"><i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
                    <h3 class="menu-title">Data UMKM Telematika</h3><!-- /.menu-title -->
                      <li class="active">
                        <a href="?admcbr=view-kasus"><i class="menu-icon fa fa-table"></i>Tabel Kasus </a>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-table"></i>Tabel Kriteria</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li>
                              <a href="?admcbr=tkrit1">Pulau</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit2">Pendidikan Pemilik</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit3">Bentuk Badan Hukum</a>
                            </li>
                            <li>
                             <a href="?admcbr=tkrit4">Tahun Mulai Operasi</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit5">Pengguna Komputer</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit6">Total Aset</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit7">Kesulitan</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit8">Prospek Peluang Usaha</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit9">Prospek 3 Bulan Lalu</a>
                            </li>
                            <li>
                             <a href="?admcbr=tkrit10">Rencana</a>
                            </li>
                            <li>
                              <a href="?admcbr=tkrit11">Balas Jasa</a>
                            </li>
                        </ul>
                    </li>
                    <h3 class="menu-title">User</h3><!-- /.menu-title -->

                    <li>
                        <a href="?admcbr=hasilprediksi"> <i class="menu-icon fa fa-tasks"></i>Hasil Prediksi</a>
                    </li>
                    <li>
                        <a href="?admcbr=manage-user"> <i class="menu-icon ti-email"></i>Manajemen User</a>
                    </li>
                  <!--   <li>
                        <a href="?admcbr=list-masukan"> <i class="menu-icon ti-email"></i>Masukan & Laporan</a>
                    </li> -->

                <div class="menu-title"></div>
                    <li>
                        <a href="./pages/log/logout.php"> <i class="menu-icon fa fa-sign-out"></i>Logout</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->
  
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">
             
                <div class="col">
                 
                    <?php 
                        $namaakun=mysql_query("SELECT * FROM user WHERE email='".$_SESSION['useradmin']."'") or die(mysql_error());
                        while ($cek_akun=mysql_fetch_array($namaakun)) {
                        $nmakun=$cek_akun['nama'];
                        }  
                     ?>
                    <div class="user-area dropdown float-right" style="margin-top: 0.3em;">
                        <a href="./?q=0"><?php echo $nmakun; ?></a>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language" >
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

         <?php 
        if (isset($_GET['admcbr'])) {
          $pageload=$_GET['admcbr'];
        }
      else
        {
          $pageload="home";
        }
        switch ($pageload) {

          case 'view-kasus':
            include "./pages/kasus/view.php";
          break;
          case 'delete-kasus':
            include "./pages/kasus/delete.php";
            break;

          case 'tkrit1':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit2':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit3':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit4':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit5':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit6':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit7':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit8':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit9':
            include "./pages/pkrit/tkrit.php";
          break;
           case 'tkrit10':
            include "./pages/pkrit/tkrit.php";
          break;
            case 'tkrit11':
            include "./pages/pkrit/tkrit.php";
          break;
          case 'opdelete':
            include "./pages/pkrit/opdelete.php";
            break;
         
          case 'hasilprediksi':
              include "./pages/hasil/thasil.php";
              break;
          case 'hapushasil':
              include "./pages/hasil/hasil_delete.php";
              break;  
          case 'input-kat':
            include "./pages/pkrit/input.php";
            break;
          case 'insert-kat':
            include "./pages/pkrit/insert.php";
            break;
          case 'tkritedit':
            include "./pages/pkrit/edit.php";
            break;
          case 'update-kat':
            include "./pages/pkrit/updatekrit.php";
            break;
          case 'list-masukan':
            include "./pages/masukan/list_masukan.php";
            break;
          case 'masukandelete':
            include "./pages/masukan/delete_masukan.php";
            break;
          case 'detail-masukan':
            include "./pages/masukan/detail_masukan.php";
            break;

          //user
          case 'manage-user':
            include "./pages/user/view.php";
            break;  
          case 'input-user':
            include "./pages/user/input.php";
            break;
          case 'insert-user':
            include "./pages/user/insert.php";
            break;
          case 'delete-user':
            include "./pages/user/delete.php";
            break;
          case 'edit-user':
            include "./pages/user/edit.php";
            break;
          case 'update-user':
            include "./pages/user/update.php";
            break;

          default:
            include "./pages/home.php";
           break;
        }
              
       ?>

  </div><!-- /#right-panel -->
  
</body>

<script type="text/javascript" language="JavaScript">
function konfirmasi()
{
tanya = confirm("Anda Yakin Akan Menghapus Data ?");
if (tanya == true) 
  return true;
else return false;
}

</script>

    <script src="assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/dashboard.js"></script>
    <script src="assets/js/widgets.js"></script>
</html>
<?php 
    }
  }
  else{
  ?>
  <script type="text/javascript" language="Javascript">
          document.location.href="./pages/log/login.php";

  </script>
    <?php

  }


?> 

</script>