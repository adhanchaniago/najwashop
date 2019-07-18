<?php 
session_start();
include "koneksi.php"; 
//jika tidak ada session atau belum login maka harus login dulu
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('login dulu ya kak untuk lihat notanya..');</script>";
	echo "<script>location='login.php';</script>";
	exit();
}

//mendapatkan id_pembelian dari url
$idpem = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM tb_pembelian WHERE id_pembelian = '$idpem' ");
$datapem = $ambil->fetch_assoc();
//mencocokan id pelanggan yg login n yang beli 
	// echo "<pre>";
	// print_r($datapem);
	// print_r($_SESSION);
	// echo "</pre>";

	// mendapatkan id pelanggan yang beli
	$id_pelanggan_beli = $datapem["id_pelanggan"];
	// mendapatkan id pelanggan yang login
	$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];
	if ($id_pelanggan_beli !== $id_pelanggan_login) {
		echo "<script>alert('gak  boleh ngepoin notanya orang ya kak hehe..');</script>";
		echo "<script>location='riwayat.php';</script>";
		exit();
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Pembayaran</title>
	<link rel="stylesheet" href="admin/css/bootstrap.css">
</head> 
<body>
	<?php include 'menu.php'; ?>
	<div class="container">
		<h2>Konfirmasi Pembayaran</h2>
		<p>Kirim bukti pembayaran kakak di sini</p>
		<div class="alert alert-info">Total pembelian anda sebesar <STRONG>Rp. <?php echo number_format($datapem['total_pembelian'] ); ?></STRONG></div>

		<form method="post" enctype="multipart/form-data">
			<div class="form-group">
				<label >Nama Penyetor</label>
				<input type="text" class="form-control" name="nama">
			</div>
			<div class="form-group">
				<label >Bank</label>
				<input type="text" class="form-control" name="bank">
			</div>
			<div class="form-group">
				<label >Jumlah</label>
				<input type="number" class="form-control" name="jumlah">
			</div>
			<div class="form-group">
				<label >Foto Bukti</label>
				<input type="file" class="form-control" name="bukti" required>
				<p class="text-danger " >Foto harus berformat JPG/PNG maksimal 3MB</p>
			</div>
			<button class="btn btn-primary" name="kirim">Kirim</button>
		</form>
		<?php 
			
			if (isset($_POST['kirim'])) {
				//$upload foto bukti 
			//membuat variabel nama file dan lokasi file sementara
			$namabukti = $_FILES['bukti']['name'];
			$lokasibukti = $_FILES['bukti']['tmp_name'];
			//membuat nama file agar unik dg menambahkan waktu upload
			$namaUnik = date("YmdHis").$namabukti;
			//proses upload
			move_uploaded_file($lokasibukti, "bukti_pembayaran/$namaUnik");
			//membuat variabel formulir
			$nama = $_POST['nama'];
			$bank = $_POST['bank'];
			$jumlah = $_POST['jumlah'];
			$tanggal = date("Y-m-d"); 
			

			$koneksi->query("INSERT INTO tb_pembayaran (id_pembelian,nama,bank,jumlah,tanggal,bukti) VALUES('$idpem','$nama','$bank ','$jumlah ','$tanggal','$namaUnik') ");

			//update status pembelian pd tb_pembelian
			$koneksi->query("UPDATE tb_pembelian SET status_pembelian='sudah kirim pembayaran' WHERE id_pembelian='$idpem'  ");

			echo "<script>alert('Terimaksih sudah melakukan pembayaran .mohon ditunggu ya kak pihak kami akan cek pembayaran dan melanjutkan pengiriman barang ');</script>";
			echo "<script>location='riwayat.php';</script>";	

			}
		 ?>
	</div>
</body>
</html>