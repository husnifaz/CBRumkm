<?php 
$tblname=$_SESSION['newtb'];
$nameserver=$_SESSION['nmsever'];

	if (isset($_POST['submit_kat'])) {
		$nmkategori=$_POST['inskat'];

		$insert_kat=mysql_query("INSERT INTO ".$tblname." VALUES ('', '$nmkategori')") or die(mysql_error());

	}

 ?>

 <script type="text/javascript" language="Javascript">
 	alert("Data Berhasil ditambahkan");
 	document.location.href="?admcbr=<?php echo $nameserver; ?>"
 </script>