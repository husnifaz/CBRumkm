<?php 

include "../../konek.php";

	if (isset($_POST['submitup'])) {
		$nama=$_POST['nameup'];
		$email=$_POST['emailup'];
		$pass=($_POST['passup']);
		$notelp=$_POST['telpup'];

		$insert_up="INSERT INTO user VALUES ('','$nama','$email','$pass','$notelp','2')";
		$q_insert_up=mysql_query($insert_up) or die(mysql_error());

	}

 ?>
  <script type="text/javascript" languange="Javascript">
	 alert('Data Berhasil Disimpan, Silahkan login untuk melanjutkan');
	 document.location.href="login.php";
 </script>