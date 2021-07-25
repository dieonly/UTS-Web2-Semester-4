<?php 
	include_once ("koneksi.php");

	if(isset($_POST['tombolcari']))
	{
		$cari = $_POST['cari'];
	}else{
		$cari='';
	}

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Data Barang</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body style="background-image: url('img/background.jpg'); background-size: cover;">
	<div class="container col-md-10">
		<div class="card">
			<div align="center" class="card-header bg-info text-white">
				<strong>TABEL DATA BARANG</strong>
			</div>
			<div style="background-color: Orange;" class="card-body">

					<td>
						<a style="margin-bottom: -45px; margin-left: 5px;" href="index.php" class="btn btn-info">Tambah Data</a>
						<form method="POST" action="data_barang.php" style="margin-bottom: 5px;text-align: right;">
							<input type="text" name="cari" value="<?php echo $cari;?>" autofocus placeholder="Masukkan Data">
							<input type="submit" class="btn btn-info" value="Cari Data" name="tombolcari">
						</form>
					</td>
						

				<table class="table table-bordered">
					<tr style="background-color: darkorange;" align="center">
						<th>ID BARANG</th>
						<th>NAMA BARANG</th>
						<th>HARGA BELI</th>
						<th>STOK</th>
						<th>IMAGE</th>
						<th>JENIS</th>
						<th>DISKON</th>
						<th>AKSI</th>
					</tr>
					<?php
						include "koneksi.php";
						
						$tampil = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang LIKE '$cari' OR nama_barang LIKE '%$cari%'");
						$no = 1;
						while($data = mysqli_fetch_array($tampil))
						{
					?>
					<tr style="background-color:#FFFAFA;" align="center">
						<td> <?php echo $no++; ?> </td>
						<td> <?php echo $data['nama_barang']; ?> </td>
						<td> Rp. <?php echo number_format($data['harga_beli'], 0, ',','.'); ?> </td>
						<td> <?php echo $data['stok']; ?> </td>
						<td> <img src="img/<?php echo $data['image']; ?>" width="100px" height="100px"></td>
						<td> <?php echo $data['jenis']; ?> </td>
						<td> <?php echo $data['diskon']; ?>% </td>
						<td>
							<a href="edit_data.php?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-warning">Edit</a> | 
							<a href="delete_data.php?id_barang=<?php echo $data['id_barang']; ?>" class="btn btn-danger">Hapus</a>
						</td>
					</tr>

				<?php } ?>

				</table>
			</div>
		</div>
	</div>
</body>
</html>