<?php 
session_start();
session_destroy();

 ?>
<script type="text/javascript" language="Javascript">	
	alert('Berhasil Logout, Silahkan Login Kembali')
	document.location.href='../../pages/log/login.php';
</script>