<?php 
session_start();

include 'koneksi.php';
//jk belum ada sssion / belum login maka larikan ke menu login
if (!isset($_SESSION['pelanggan'])) {
	echo "<script>alert('silahkan login dulu ya kak .. hehe');</script>";
	echo "<script>location='login.php';</script>";
}
elseif (empty($_SESSION['keranjang']) || !isset($_SESSION['keranjang'])) {
		echo "<script>alert('Keranjang kosong kak, kakak belanja aja dulu..')</script>";
		echo "<script>location='index.php';</script>";

	}

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Chekout</title>
	<link rel="stylesheet" href="admin/css/bootstrap.css">
</head>
<body>
<!-- navbar -->
		<?php include"menu.php"; ?>
	<h2>Chekout</h2>

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
									<!-- <th>Aksi</th> -->
								</tr>
							</thead>
							<tbody>
								<?php $nomor =1; ?>
								<?php $totalBelanja=0; ?>
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

										
									</tr>
									<?php $nomor++; ?>
									<?php $totalBelanja+=$subharga; ?>
									<?php endforeach ?>
			
			
							</tbody>
							<tfoot>
								<tr>
									<th colspan="4">Total Belanja</th>
									<th>RP. <?php echo number_format($totalBelanja); ?></th>
								</tr>
							</tfoot>
						</table>
							<form  method="post">
								<div class="row">

									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['nama_pelanggan']; ?>">
										</div>
									</div>

									<div class="col-md-4">
										<div class="form-group">
											<input type="text" class="form-control" readonly value="<?php echo $_SESSION['pelanggan']['telepon']; ?>">
										</div>
									</div>

									<div class="col-md-4">
										
											<select name="id_ongkir" class="form-control" required>
												<option value="" required>Pilih Onkos Kirim</option>
												<?php 
													$ambil = $koneksi->query("SELECT * FROM tb_ongkir");
													 while ($perproduk = $ambil->fetch_assoc() ) {
												 ?>

												<option value="<?php echo $perproduk['id_ongkir']; ?>" required>
													<?php echo $perproduk['nama_kota']; ?>
													Rp. <?php echo number_format($perproduk['tarif']); ?>
												</option>
												
												<?php } ?>
											</select>
										
									</div>
								</div>
								<div class="form-group">
									<label >Alamat Lengkap Pengiriman</label>
									<textarea name="alamat_pengiriman" class="form-control" placeholder="Masukkan alamat pengiriman lengkap(termasuk kode post) ya kak , biar gak nyasar..hehe" rows="10"></textarea>

								</div>
								<input type="submit" class="btn btn-primary" name="checkout" value="Checkout">
							</form>

							<?php 
							//melakukan insert ke 2 tabel sekaligus  tb_pembelian n tb_pembelian produk
							//
							if (isset($_POST['checkout'])) {
								
								$id_pelanggan = $_SESSION['pelanggan']['id_pelanggan'];
								$id_ongkir = $_POST['id_ongkir'];
								date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
								$tanggal_pembelian = date("Y-m-d H:i:s");
								$alamat_pengiriman = $_POST['alamat_pengiriman'];

								$ambil = $koneksi->query("SELECT * FROM tb_ongkir WHERE id_ongkir='$id_ongkir'  ");
								$arrayOngkir = $ambil->fetch_assoc();
								$nama_kota = $arrayOngkir['nama_kota'];
								$tarif = $arrayOngkir['tarif'];


								$total_pembelian = $totalBelanja + $tarif;

								//1. Menyimpan data ke table pembelian >x< menghapus  data pembelian produk untuk dikembalikan ke table produk
								$koneksi->query("INSERT  INTO tb_pembelian(id_pelanggan,id_ongkir,tanggal_pembelian,total_pembelian,nama_kota,tarif,alamat_pengiriman) VALUES('$id_pelanggan','$id_ongkir','$tanggal_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengiriman')");

								//mendapatkan id_pembelian terakhir untuk disi ke tb_pembelian_produk 
								$id_pembelian_terakhir = $koneksi->insert_id;

								foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) { //edit $jumlah

									//mendapatkan data produk berdasarkan id_produk untuk digunakan bila ada update harga tidak pengaruh ke nota saat pembelian
									$ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk' ");
									$perproduk = $ambil->fetch_assoc();

									$namaProduk = $perproduk['nama_produk'];
									$hargaProduk = $perproduk['harga_produk'];
									$beratProduk = $perproduk['berat'];

									$subberat = $perproduk['berat']*$jumlah;
									$subharga = $perproduk['harga_produk']*$jumlah;


									//memasukan data ke tb_pembelian_produk >x< menghapus  data _terakhir tb_pembelian produk untuk dikembalikan ke table produk
									$koneksi->query("INSERT INTO tb_pembelian_produk (id_pembelian,id_produk,jumlah,nama,harga,berat,subberat,subharga) Values('$id_pembelian_terakhir','$id_produk','$jumlah','$namaProduk','$hargaProduk','$beratProduk','$subberat','$subharga')");

									//skrip update stok ->dalam perulangan() >x< update jadi ditambah
									$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk' ");

								}
								//mengkosongkan keranjang karena sudah masuk kedatabase
									unset($_SESSION['keranjang']);

									//tampilan dialihkan ke halaman nota
									echo "<script>alert('Pembelian sukses kak');</script>";
									echo "<script>location='nota.php?id=$id_pembelian_terakhir';</script>";

							}

							 ?>
			</div>
			<!-- <footer>
				<p>&copy 2018 NajwaShop. All Rights Reserved | </p>
			</footer> -->
		</section>

		
 <pre><?php  print_r($_SESSION['pelanggan']);?></pre> 
 <pre><?php print_r($_SESSION['keranjang']);?></pre>

</body>
</html>