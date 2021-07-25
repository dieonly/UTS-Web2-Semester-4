<?php 
	include 'koneksi.php';
	$id = $_GET['id_barang'];
	$ambildata = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id_barang='$id'");
 	$data = mysqli_fetch_array($ambildata);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Edit Data</title>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-3.4.1.min.js"></script>
</head>
<body style="background-image: url('img/background.jpg'); background-size: cover;">
	<div style="background-color: Orange;" class="container col-md-5">
		<div class="card">
			<div align="center" class="card-header bg-info text-white">
				<strong>EDIT DATA BARANG</strong>
			</div>
			<div class="card-body">
				<form action="" method="POST" class="form-item" enctype="multipart/form-data">
					<div class="form-group">
						<label for="nama_barang">Nama Barang</label>
						<input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>" class="form-control col-md-9" placeholder="Masukkan nama barang" >
					</div>
					<div class="form-group">
						<label for="harga_beli">Harga Beli</label>
						<input type="number" name="harga_beli" value="<?php echo $data['harga_beli'] ?>" class="form-control col-md-9" placeholder="Masukkan harga beli" >
					</div>
					<div class="form-group">
						<label for="stok">Stok</label>
						<input type="number" name="stok" value="<?php echo $data['stok'] ?>" class="form-control col-md-9" placeholder="Masukkan banyak stok" >
					</div>
					<div class="form-group">
						<label for="image">Upload Image</label><br>
						<img src="img/<?php echo $data['image'] ?>" width="100px" height="100px">
						<input type="file" name="image" class="form-control col-md-9">
					</div>
					<div class="form-group">
						<label for="jenis">Jenis</label>
						<input type="text" name="jenis" value="<?php echo $data['jenis'] ?>" class="form-control col-md-9" placeholder="Masukkan Jenis">
					</div>
					<div class="form-group">
						<label for="diskon">Diskon</label>
						<input type="number" name="diskon" value="<?php echo $data['diskon'] ?>" class="form-control col-md-9" placeholder="Masukkan Diskon">
					</div>
					<br>
					<div>
						<button type="submit" class="btn btn-primary" name="simpan">UPDATE</button>
						<button type="button" value="Go Back" onclick="history.back(-1)" class="btn btn-danger">BATAL</button>
					</div>
					
				</form>
				<?php 
					include "koneksi.php";
					if(isset($_POST['simpan']))
					{
						$nama_barang    = $_POST['nama_barang'];
						$harga_beli     = $_POST['harga_beli'];
						$stok           = $_POST['stok'];
						$image          = $_FILES['image']['name'];
						$jenis          = $_POST['jenis'];
						$diskon         = $_POST['diskon'];

						if($image != "")
						{
							$eks_boleh = array('png', 'jpg', 'jpeg');
							$x = explode('.', $image);
							$ekstensi = strtolower(end($x));
							$source = $_FILES['image']['tmp_name'];
							$folder = './img/';

							if(in_array($ekstensi, $eks_boleh)=== true){
								move_uploaded_file($source, $folder.$image);

						/*	mysqli_query($koneksi, "UPDATE tb_barang SET('',
								'$nama_barang', '$harga_beli', '$stok','$image','$jenis','$diskon'
								)"); 
						*/
							mysqli_query($koneksi, "UPDATE tb_barang 
							SET nama_barang='$nama_barang', harga_beli='$harga_beli', stok='$stok', image='$image', jenis='$jenis', diskon='$diskon'
							WHERE id_barang='$id'");

							echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan... </h2></div>";
							echo "<meta http-equiv='refresh' content='1;url=http://localhost/web2_uts/data_barang.php'>";
							} else{
								echo "<script>alert('Ekstensi upload hanya jpg & png');</script>";
							}
						}

						//image
						$source = $_FILES['image']['tmp_name'];
						$folder = './img/';
						move_uploaded_file($source, $folder.$image);
					/*	
						mysqli_query($koneksi, "UPDATE tb_barang 
							SET nama_barang='$nama_barang', harga_beli='$harga_beli', stok='$stok', image='$image', jenis='$jenis', diskon='$diskon'
							WHERE id_barang='$id'");
						
						//batas upload image
					*/
					//	echo "<div align='center'><h5> Silahkan Tunggu, Data Sedang Disimpan... </h2></div>";
					//	echo "<meta http-equiv='refresh' content='1;url=http://localhost/web2_uts/data_barang.php'>";

					}
				 ?>

			</div>
		</div>
	</div>
</body>
</html>

