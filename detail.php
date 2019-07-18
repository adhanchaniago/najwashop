
<?php session_start(); ?>
<?php include "koneksi.php"; ?>
<?php 
	//mendapatkan id produk dari url
$id_produk =$_GET['id' ];
//queri ambil produk
	$ambil=$koneksi->query("SELECT * FROM tb_produk WHERE id_produk = '$id_produk' ");
	$detail = $ambil->fetch_assoc();
	// echo "<pre>";
	// print_r($detail);
	// echo "</pre>";

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Detail Produk</title>
	<link rel="stylesheet" href="admin/css/bootstrap.css">
</head>
<body>
	<!-- navbar -->
		<?php include"menu.php"; ?>

		<section class="konten">
		<div class="container">
			<div class="row">
				<div class="col-md-6">
					<img class="img-responsive" src="foto_produk/<?php echo $detail['foto_produk']; ?>"  alt="">
				</div>
				<div class="col-md-6">
					<h2><?php echo $detail['nama_produk']; ?></h2>
					<h4>Rp.<?php echo number_format($detail['harga_produk']); ?></h4>

					<h5>Stok: <?php echo $detail['stok_produk']; ?></h5>

					<p><?php echo $detail['deskripsi_produk']; ?></p>
					<form action="" method="post">
							<div class="form-group">
							<label for="">Jumlah</label>
								<div class="input-group">
									<input type="number" min='1' name="jumlah" class="form-control" max="<?php echo $detail['stok_produk']; ?>" value='1'>
									<div class="input-group-btn">
										<button class="btn btn-primary" name="beli">Beli</button>
									</div>
								</div>
							</div>
					</form>
					<?php 
					// jika tombol beli di klik
						if (isset($_POST['beli'])) {
							//mendapatkan jumlah yang diinputkan
							$jumlah = $_POST["jumlah"]; 
							//=====
							if ($jumlah > $detail['stok_produk']) {
								echo "<script>alert('Maaf kak, stok produk lebih sedikit dari yang dibeli.. ')</script>";
							}elseif ($detail['stok_produk']==0) {
								echo "<script>alert('Maaf kak, stok produk item ini habis.. ')</script>";
							}else{
							//====
							

								//memasukkan ke keranjang belanja(masuk melalui array foreach[ variabel= session keranjang  key/indeks= id_produk value/nilai= $jumlah)
								//jika dikeranjang sudah ada produk maka akan ditambah sesuai inputan
								if (isset($_SESSION['keranjang'][$id_produk])) {
									$_SESSION['keranjang'][$id_produk]+=$jumlah;
								}else{
									$_SESSION['keranjang'][$id_produk]= $jumlah;
								}
							}


							echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
							echo "<script>location='keranjang.php';</script>";
						}
					 ?>
				</div>
				
			</div>
		</div>
			
		</section>

</body>
</html>