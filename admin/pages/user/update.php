<?php 
	if (isset($_POST['updateuser'])) {
		$namauser=$_POST['namauser'];
		$emailuser=$_POST['emailuser'];
		$passuser=$_POST['passuser'];
		$hpuser=$_POST['hpuser'];
		$hakuser=$_POST['hakuser'];
		$idusers=$_POST['userid'];
		mysql_query("UPDATE user SET nama='$namauser', email='$emailuser', pass='$passuser', nohp='$hpuser', hak_akses='$hakuser' WHERE id_user='$idusers'") or die(mysql_error());

	}

 ?>
 <script type="text/javascript" language="Javascript">
 	alert("Data berhasil diperbaharui");
 	document.location.href="?admcbr=manage-user";
 </script>