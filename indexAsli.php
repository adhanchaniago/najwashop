<?php 
session_start();
	$koneksi = new mysqli("localhost","root","","najwa_shop");
echo "<pre>";
print_r($_SESSION);
echo "</pre>";
//error_reporting(0);
	include"menu.php";
	include "batas_expired.php"; // utk mencek pesanan yg sudah expired (jadi triger)
	expired();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Najwa Shop</title>
	<!-- <link rel="stylesheet" href="admin/css/tambahan/bootstrap.css"> -->
	<link rel="stylesheet" href="admin/css/bootstrap.css">
	<!-- <link rel="stylesheet" href="admin/css/style.css"> -->
</head>
	<body>
		<!-- navbar -->
		

		<!-- KOnten -->
		<section class="konten">
			<div class="container">
					<h1>Produk Terbaru</h1>

					<div class="row">

						<?php $ambil = $koneksi->query("SELECT * FROM tb_produk");    ?>
						<?php while( $perproduk= $ambil->fetch_assoc()){  //fetch_assoc / mysqli_fetch_array= untuk menampung semua data dalam array ?>
						
						<div class="col-md-3 col-sm-6 col-xs-6">
							<div class=" thumbnail">
								<img  src="foto_produk/<?	 echo $perproduk['foto_produk']; ?>" >
								<div class="caption">
									<h5><?php echo $perproduk['nama_produk']; ?></h5>
									<h5>Rp.<?php echo number_format($perproduk['harga_produk']); ?></h5>
									<?php if ($perproduk['stok_produk']<1): ?>
											<h5>Stok : Habis</h5>
										<?php else: ?>
											<h5>Stok : <?php echo $perproduk['stok_produk']; ?></h5>
									<?php endif ?>

									<!-- <h5>Stok : <?php //echo $perproduk['stok_produk']; ?></h5> -->
									<a href=" beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary">Beli</a>
									<a href=" detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Detail</a>
								</div>
							</div>
						</div>
						<?php } ?>

					</div>
			</div>
		</section>
	</body>
</html>
