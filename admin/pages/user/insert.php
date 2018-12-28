<?php 

	if (isset($_POST['submituser'])) {
		$namauser=$_POST['namauser'];
		$emailuser=$_POST['emailuser'];
		$passuser=$_POST['passuser'];
		$hpuser=$_POST['hpuser'];
		$hakuser=$_POST['hakuser'];

		$insert_kat=mysql_query("INSERT INTO user VALUES ('', '$namauser','$emailuser','$passuser','$hpuser','$hakuser')") or die(mysql_error());

	}

 ?>

 <script type="text/javascript" language="Javascript">
 	alert("User Berhasil ditambahkan");
 	document.location.href="?admcbr=manage-user";
 </script>