<?php 

if (isset($_POST['submitplus'])) {
	
	$tamkategori=$_POST['tambahkat'];
	$namakategori=$_POST['namakat'];
}

	$insert_kat=mysql_query("INSERT INTO $tamkategori VALUES ('LAST_INSERT_ID()','$namakategori');") or die(mysql_error());

 ?>
 <script type="text/javascript" language="Javascript">
 	alert("Kategori berhasil ditambahkan");
 	document.location.href="?cbr=form";
 </script>
