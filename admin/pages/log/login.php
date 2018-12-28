<?php 
  ob_start();
  session_start();
  include "../../../konek.php";
?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CBUMKM ADMIN LOGIN</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="stylesheet" href="../../assets/css/normalize.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../assets/css/themify-icons.css">
    <link rel="stylesheet" href="../../assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="../../assets/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="assets/css/bootstrap-select.less"> -->
    <link rel="stylesheet" href="../../assets/scss/style.css">

    
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

</head>
<body class="bg-dark">
    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <a class="navbar-brand" href="./?q=0"><strong>CBUMKM</strong>&nbsp;Admin</a>
                    </a>
                </div>
                <div class="login-form">
                    <form method="post">
                    	 <?php 
				      if(isset($_POST['submitad'])) {

				        $uname=$_POST['email'];
				        $pass=($_POST['sandi']);

				        $cekuser="SELECT * FROM user WHERE email='$uname' AND pass='$pass'";
				        $q_cekuser=mysql_query($cekuser) or die(mysql_error());

				        $rowuser=mysql_fetch_row($q_cekuser);
				        

				        if (mysql_num_rows($q_cekuser)>0){
				          $_SESSION['useradmin']=$uname;
				          $_SESSION['loginadmin']=TRUE;
				          
                            if ($rowuser[5]=='1') {  
    						    ?>
                                 <script type="text/javascript" language="Javascript">
                			          alert('Login berhasil, Selamat datang..');
                			          document.location.href="../../?q=0";
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
            }
                else { 
         		?>
         		<script type="text/javascript" language="Javascript">
         			alert('Maaf!! Email atau sandi yang anda masukan salah, silahkan coba lagi.');
         			document.location.href="./login.php";
         		</script>
                <?php
		        }
		      }
		       ?>
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" placeholder="Masukan Email" name="email">
                        </div>
                        <div class="form-group">
                            <label>Kata Sandi</label>
                            <input type="password" class="form-control" placeholder="Masukan Kata Sandi" name="sandi">
                        </div>
                        <div class="checkbox">
                       </div>
                        <input type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="submitad" value="Masuk">
                    </form>
            </div>
        </div>
    </div>
</div>

    <script src="../../assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="../../assets/js/popper.min.js"></script>
    <script src="../../assets/js/plugins.js"></script>
    <script src="../../assets/js/main.js"></script>


</body>
</html>
