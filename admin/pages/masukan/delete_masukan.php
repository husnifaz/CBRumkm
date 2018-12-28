<?php 
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$delete=mysql_query("DELETE FROM feedback where id_masukan='$id'");
	}

 ?>

 <script type="text/javascript" languange="Javascript">
 alert('Data Telah Dihapus !');
 <?php echo "document.location.href='?admcbr=list-masukan'";?>

 </script>