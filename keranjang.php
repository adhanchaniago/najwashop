<?php 
	session_start();
	// echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";
	include "koneksi.php";

	//jika keranjang kosong 
	if (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
		echo "<script>alert('Keranjang kosong kak, kakak belanja aja dulu..')</script>";
		echo "<script>location='index.php';</script>";

	}

 ?>

	<!DOCTYPE html>
	<html>
	<head>
	    <title >Keranjang Belanja</title>
	    <!-- Bootstrap core CSS -->
	    <link href="admin/css/bootstrap.css" rel="stylesheet">
	    <!-- Fontawesome core CSS -->
	    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
	    <!--GOOGLE FONT -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	    <!--Slide Show Css -->
	    <!-- <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" /> -->
	    <!-- custom CSS here -->
	    <link href="assets/css/style.css" rel="stylesheet" />
	    <!-- B -->
	    <!-- <link id="callCss" rel="stylesheet" href="admin/css/themes/bismillah.min.css" media="screen"/> -->
	    <link id="callCss" rel="stylesheet" href="admin/css/themes/carousel.min.css" media="screen"/>
	    <link href="admin/css/themes/base.css" rel="stylesheet" media="screen"/>
	    <!-- <link rel="stylesheet" href="admin/css/bootstrap.min.css"> -->
	</head>
	<body>
		<!-- navbar -->
		<?php include"menu2.php"; ?>

		<section class="konten">
			<div class="container">
				<h1 >Keranjang Belanja</h1>
					<hr>
						<table class="table table-bordered">
							<thead bgcolor="#FF0481">
								<tr>
									<th>No</th>
									<th>Produk</th>
									<th>Harga</th>
									<th>Jumlah</th>
									<th>Subharga</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
								<?php $nomor =1; ?>
								<?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah): ?>
									<!-- melakukan perulangan dalam bentuk array . $variabel = penyimpan array, $key=index array $value = nilai array -->

									<!-- menampilkan  produk yg sedang diperulangkan berdasaarkan id produk -->
									<?php 
										$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk' ");
										$pecah = $ambil->fetch_assoc();
										$subharga = $jumlah * $pecah['harga_produk'];
										// echo "<pre>";
										// print_r($pecah);
										// echo "</pre>";
									 ?>
				
									<tr>
										<td><?php echo $nomor; ?></td>
										<td><?php echo $pecah['nama_produk']; ?></td>
										<td><?php echo number_format($pecah['harga_produk']); ?></td>
										<td><?php echo $jumlah; ?></td>
										<td><?php echo number_format($subharga); ?></td>
										<td><a href="hapusKeranjang.php?id=<?php echo $id_produk;  //$pecah['id_produk'] ?>" class="btn btn-danger btn-xs">Hapus</a></td>
									</tr>
									<?php $nomor++; ?>
									<?php endforeach ?>
			
			
							</tbody>
			
						</table>
							<a href="index.php" class="btn btn-default">Lanjutkan Belanja</a>
							<a href="checkout.php" class="btn btn-primary">Checkout</a>
			</div>
			<!-- <footer>
				<p>&copy 2018 NajwaShop. All Rights Reserved | </p>
			</footer> -->
		</section>
		<!-- Tambahan -->
			<!--Core JavaScript file  -->
		    <script src="assets/js/jquery-1.10.2.js"></script>
		    <!--bootstrap JavaScript file  -->
		    <script src="assets/js/bootstrap.js"></script>
		    <!--Slider JavaScript file  -->
		    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
		    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
		      <!-- <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script> -->
			

			<!-- bootshop -->
		   <!-- Placed at the end of the document so the pages load faster ============================================= -->
		   <script src="admin/css/themes/js/jquery.js" type="text/javascript"></script>
		   <script src="admin/css/themes/js/bootstrap.min.js" type="text/javascript"></script>
		   <script src="admin/css/themes/js/google-code-prettify/prettify.js"></script>
		   
		   <script src="admin/css/themes/js/dropdown_sidebar.js"></script>
		    <script src="admin/css/themes/js/jquery.lightbox-0.5.js"></script>

		   <!-- bootshop -->
		
	</body>
	</html>

