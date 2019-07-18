<?php 

session_start();
unset($_SESSION['keranjang']);

include 'koneksi.php';
include 'batas_expired.php';
//jika tidak ada session atau belum login maka harus login dulu
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('login dulu ya kak untuk lihat notanya..');</script>";
	echo "<script>location='login.php';</script>";
}
//$id_pembelian
	$id_pembelian=$_GET['id'] ;
	//echo $id_pembelian;
	//kita selesaikan besok hhe


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Nota Belanja</title>
 	<link rel="stylesheet" href="admin/css/bootstrap.css">
 </head>
 <body>
 	<!-- navbar -->
		<?php include"menu2.php"; ?>
	<h2>Nota Belanja</h2>


	<section class="konten">
		<div class="container">
			<!-- //copy dari detail.php -->
			<h2>Detail Pembelian</h2>
<?php 
// mengambil data pd table pembelian dan tb  pelanggan
	$ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian='$_GET[id]' ");
	$urai = $ambil->fetch_assoc();
	// echo "<pre>";
		expired();
	// echo "</pre>";
 ?>
 <!-- <h2>Data orang yang beli / $pecah</h2>
 <pre><?//php print_r($pecah); ?></pre>   -->
<!-- 
 <h2>Data orang yang login /$session</h2>
 <pre><?php //print_r($_SESSION) ?></pre> -->

  <!-- jk pelanggan yg beli tdk sama dg pelanggan yg login, maka halaman di redirect ke riwayat.php karena dia tidak berhak melihat nota orang lain -->
 <!--pelanggan yang beli harus pelanggan yg login -->
 	<?php 
 		//mendapatkan id_pelanggan yg beli
 		$id_pelangganygBELI = $urai['id_pelanggan'];

 		//mendapatkan id_pelanggan yg login
 		$id_pelangganygLOGIN = $_SESSION['pelanggan']['id_pelanggan'];
 		if ($id_pelangganygBELI!=$id_pelangganygLOGIN) {
 			echo "<script>alert('hayoo .. kakak gak boleh ngepoin nota orang ya..')</script>";
 			echo "<script>location='riwayat.php';</script>";
 			exit();
 		}
 		
 	 ?>
	<div class="row">

		<div class="col-md-4">
			<h3>Pembelian</h3>
			<strong>No.Pembelian: <?php echo $urai['id_pembelian']; ?></strong><br>
			Tanggal Belanja : <?php echo $urai['tanggal_pembelian']; ?> <br>
			Total Belanja + Ongkir : Rp.<?php echo number_format($urai['total_pembelian']); ?>
		</div>
		<div class="col-md-4">
			<h3>Pelanggan</h3>
			<strong>Nama Pembeli :<?php echo $urai ['nama_pelanggan']; ?></strong><br>
			<p>
			 	No Telepon : <?php echo $urai['telepon']; ?> <br>
				Email : <?php echo $urai['email_pelanggan']; ?>
			 </p>
		</div>
		<div class="col-md-4">
			<h3>Pengiriman</h3>
			<strong><?php echo $urai['nama_kota']; ?></strong><br>
			Ongkos Kirim : Rp.<?php echo number_format($urai['tarif']); ?> <br>
			Alamat : <?php echo $urai['alamat_pengiriman']; ?>
		</div>

	</div>

 <table class="table table-bordered" >
 	<thead bgcolor="#24E300">
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>id Produk</th>
 			<th>Harga</th>
 			<th>Berat</th>
 			<th>Jumlah</th>
 			<th>Subberat</th>
 			<th>Subharga</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<!-- mengambil data produk dan table pembelian_produk dan seleksi data sesuai id_ pembelian-->
 		<?php $ambil=$koneksi->query("SELECT * FROM tb_pembelian_produk  WHERE id_pembelian='$_GET[id]' "); ?>
 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama']; ?></td>
 			<td><?php echo $pecah['id_produk']; ?></td>
 			<td>Rp.<?php echo number_format($pecah['harga']); ?></td>
 			<td><?php echo $pecah['berat']; ?> Gr.</td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td><?php echo $pecah['subberat']; ?> Gr.</td>
 			<td>Rp.<?php echo number_format($pecah['subharga']) ; ?></td>

 		</tr>

 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>
 		<div class="row">
 			<div class="col-md-12">
 				<div class="alert alert-info">
 					<p>
 						<?php $tgl_expired = date('H:i:s d-m-Y', strtotime($urai['tanggal_expired'])); ?>
 						Silahkan melakukan pembayaran sebesar Rp.<?php echo number_format($urai['total_pembelian']); ?> Sebelum pukul <?php echo $tgl_expired; ?>  ke:<br>
 						<strong>Bank BRI 0936-0076-2136 AN. Najwa S Tibyani</strong>
 					</p>
 				</div>
 			</div>
 		</div>
		
	</section>
 		<?php //$pecah=$ambil->fetch_assoc(); ?>
	<?php //$_SESSION['keranjangnyaNOta'] = $pecah; ?>
	<?php //unset($_SESSION['keranjangnyaNOta']); ?>

	<!-- <pre> -->
		<!-- <?php print_r($_SESSION) ?> -->

	<!-- </pre> -->
 </body>
 </html>