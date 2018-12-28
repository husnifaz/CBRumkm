<?php 

if (isset($_GET['id'])) {
	$idhasil=$_GET['id'];

}

	$kasusdelete=mysql_query("DELETE FROM hsl_prediksi WHERE id_hp=$idhasil")or die(mysql_error());

 ?>

 <script type="text/javascript" languange="Javascript">
 alert('Data Telah Dihapus !');
 document.location.href="?admcbr=hasilprediksi";
 </script>