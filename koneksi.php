<?php 
	$koneksi = mysqli_connect("localhost", "root", "", "db_19630047");
	if($koneksi)
	{
		echo "";
	}else{
		echo "Gagal terhubung ke Database";
	}
 ?>