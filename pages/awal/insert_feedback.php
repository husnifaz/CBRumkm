<?php 

if (isset($_POST['submitmasukan'])) {
	
	$pengguna=$_SESSION['iduser'];
	$isi=$_POST['isimasukan'];
	$jenis=$_POST['jenis1'];
	$tanggal=date('Y-m-d');

	$query=("INSERT INTO feedback VALUES ('','$pengguna','$jenis','$isi','$tanggal')");
	$cekquery=mysql_query($query)or die(mysql_error());

}


 ?>

 <script type="text/javascript">
 	alert("Masukan berhasil dikirim, Terimakasih telah memberikan masukan kepada kami, harap menunggu untuk perbaikan :)");
 	window.location.href="?cbr";
 </script>