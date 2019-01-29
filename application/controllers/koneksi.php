<?php
	//defining host, user, password, and database that will be used
	$host = "localhost";
	$user = "root";
	$password = "";
	$database = "pbd_pegawai";
	
	//building connection to database
	$koneksi = mysql_connect($host, $user, $password);
	
	//select database that will be used
	mysql_select_db($database,$koneksi);
	
	//connection success test
	if($koneksi){
		//echo "berhasil koneksi";
	} else {
		echo "gagal koneksi";
	}
?>
