<?php 

$newtb=$_SESSION['newtb'];
$nmserver=$_SESSION['nmsever'];

 

$arr_idname=split('t_', $newtb);
echo "$arr_idname[1]";



	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$delete=mysql_query("DELETE FROM ".$newtb." where id_".$arr_idname[1]."='$id'");
	}

 ?>

 <script type="text/javascript" languange="Javascript">
 alert('Data Telah Dihapus !');
 <?php echo "document.location.href='?admcbr=".$nmserver."'";?>

 </script>