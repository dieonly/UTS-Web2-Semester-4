<?php 
	include "koneksi.php";
	$id = $_GET['id_barang'];
	$ambilData = mysqli_query($koneksi, "DELETE FROM tb_barang WHERE id_barang='$id'");
	echo "<meta http-equiv='refresh' content='1;url=http://localhost/web2_uts/data_barang.php'>";
	
 ?>