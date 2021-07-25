<?php 
	include 'koneksi.php';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Input Data</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body style="background-image: url('img/background.jpg'); background-size: cover;">
	<div style="background-color: orange;" class="container col-md-5">
		<div class="card">
			<div align="center" class="card-header bg-info text-white">
				<strong>INPUT DATA BARANG</strong>
			</div>
			<div style="background-color: #FFFAFA;" class="card-body">
				<form action="" method="POST" class="form-item" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" name="nama_barang" class="form-control col-md-9" placeholder="Masukkan nama barang" autofocus >
					</div>
					<div class="form-group">
						<label for="harga_beli">Harga Beli</label>
						<input type="number" name="harga_beli" class="form-control col-md-9" placeholder="Masukkan harga beli" >
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="number" name="stok" class="form-control col-md-9" placeholder="Masukkan banyak stok" >
					</div>
					<div class="form-group">
						<label for="image">Upload Image</label>
						<br>
						<input type="file" name="image" class="form-control col-md-9">
					</div>
					<div class="form-group">
						<label for="jenis">Jenis</label>
						<input type="text" name="jenis" class="form-control col-md-9" placeholder="Masukkan Jenis">
					</div>
					<div class="form-group">
						<label for="diskon">Diskon</label>
						<input type="number" name="diskon" class="form-control col-md-9" placeholder="Masukkan Diskon">
					</div>
					<br>
					<div>
						<button type="submit" class="btn btn-primary" name="simpan">SIMPAN</button>
						<button type="reset" class="btn btn-danger">BATAL</button>
					</div>
					
				</form>
				<?php 
					include "koneksi.php";
					if(isset($_POST['simpan']))
					{
						$nama_barang = $_POST['nama_barang'];
						$harga_beli  = $_POST['harga_beli'];
						$stok        = $_POST['stok'];
						$image       = $_FILES['image']['name'];
						$jenis       = $_POST['jenis'];
						$diskon      = $_POST['diskon'];

						//Penentuan Ekstensi
						if($image != "")
						{
							$eks_boleh = array('png', 'jpg', 'jpeg');
							$x = explode('.', $image);
							$ekstensi = strtolower(end($x));
							$source = $_FILES['image']['tmp_name'];
							$folder = './img/';

							if(in_array($ekstensi, $eks_boleh)=== true){
								move_uploaded_file($source, $folder.$image);

							mysqli_query($koneksi, "INSERT INTO tb_barang VALUES('',
								'$nama_barang', '$harga_beli', '$stok','$image','$jenis','$diskon'
								)"); 

							echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan... </h2></div>";
							echo "<meta http-equiv='refresh' content='1;url=http://localhost/web2_uts/data_barang.php'>";
							} else{
								echo "<script>alert('Ekstensi upload hanya jpg & png');</script>";
							}
						}

					}
				 ?>

			</div>
		</div>
	</div>
</body>
</html>

