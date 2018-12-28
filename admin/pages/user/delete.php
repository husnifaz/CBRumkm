<?php 

	if(isset($_GET['id'])){
		$id=$_GET['id'];
		$delete=mysql_query("DELETE FROM user where id_user=$id");
	}

 ?>

 <script type="text/javascript" languange="Javascript">
 alert('Data Telah Dihapus !');
 document.location.href="?admcbr=manage-user";

 </script>