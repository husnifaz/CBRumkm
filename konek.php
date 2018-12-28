<?php 
	
	$host='localhost';
	$user='root';
	$pass='';
	$dbname='umkmcbr';

	$koneksi=mysql_connect($host,$user,$pass) or die(mysql_error());
	mysql_select_db($dbname, $koneksi) or die(mysql_error());
 ?>