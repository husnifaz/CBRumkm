<?php 

if (isset($_GET['id'])) {
	$idkasus=$_GET['id'];

}

	$kasusdelete=mysql_query("DELETE FROM t_kasus WHERE id_kasus=$idkasus")or die(mysql_error());

 ?>

 <script type="text/javascript" languange="Javascript">
 alert('Kasus Telah Dihapus !');
 document.location.href="?admcbr=view-kasus";
 </script>