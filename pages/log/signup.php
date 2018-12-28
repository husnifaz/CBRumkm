<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../assets/img/logo-ico2.png">

    <title>Daftarkan Akun</title>
    <!-- Bootstrap core CSS -->
    <link href="../../assets/css/bootstrap.css" type="text/css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../assets/css/mystyle.css" type="text/css" rel="stylesheet">
  </head>

  <body>
    <div class="container con-awal">
    <h2 class="form-signin-heading" style="text-align: center; margin-bottom: 5rem;">Daftar Akun Baru</h2>

      <form class="col-md-6 rounded mx-auto d-block" method="post" action="run_signup.php">
          <div class="form-group">
          <label for="inputAddress">Nama Lengkap</label>
          <input type="text" class="form-control" id="inputAddress" placeholder="Nama Lengkap" name="nameup" required autofocus>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label>Email</label>
            <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="emailup" required>
          </div>
          <div class="form-group col-md-6">
            <label for="inputPassword4">Kata Sandi</label>
            <input type="password" class="form-control" id="inputPassword4" placeholder="Kata Sandi" name="passup" required>
          </div>
        </div>
      
        <div class="form-group">
          <label>Nomor Telepon</label>
          <input type="number" class="form-control" placeholder="08X-XXX-XXX" name="telpup" aria-describedby="telpHelp" required>
           <small id="telpHelp" class="form-text text-muted">*Optional</small>
        </div>
        <button type="submit" class="btn btn-primary-login btn-block" name="submitup">Daftarkan</button>  
        <p style="padding-top: 2rem; text-align: center;"><a href="login.php">Kembali Ke Halaman Login </a></p>    
    </form>
     </div> <!-- /container -->
     
  </body>
</html>