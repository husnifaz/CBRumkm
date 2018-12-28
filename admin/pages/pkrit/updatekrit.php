<?php 
$tblname=$_SESSION['newtb'];
$colname=$_SESSION['colserver'];
$nameserver=$_SESSION['nmsever'];

$arr_idname=split('t_', $tblname); 


	if (isset($_POST['update_kat'])) {
		$nmkategori=$_POST['inskat'];
		$idkat=$_POST['idkat'];

		mysql_query("UPDATE $tblname SET ".$arr_idname[1]."='$nmkategori' WHERE id_".$arr_idname[1]."='$idkat'") or die(mysql_error());

	}

 ?>

 <script type="text/javascript" language="Javascript">
 	alert("Data berhasil diperbaharui");
 	document.location.href="?admcbr=<?php echo $nameserver ?>"
 </script>