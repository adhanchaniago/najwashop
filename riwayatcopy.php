<?php 
session_start();
include "koneksi.php"; 
//jika tidak ada session atau belum login maka harus login dulu
if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
	echo "<script>alert('login dulu ya kak untuk lihat notanya..');</script>";
	echo "<script>location='login.php';</script>";
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Belanja</title>
	<link rel="stylesheet" href="admin/css/bootstrap.css">
	<!-- <link rel="stylesheet" href="admin/css/style.css"> -->
</head>
<body>
	<?php include "menu.php"; ?>
	
	<pre><?php print_r($_SESSION) ?></pre>
	
	<section class="riwayat">
		<div class="container">
			<h3>Riwayat Belanja <?php echo $_SESSION["pelanggan"]["nama_pelanggan"]; ?></h3>

			<table class="table table-bordered">
				<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Status Pembelian</th>
					<th>Total</th>
					<th>Opsi</th>
				</tr>
				</thead>
				<tbody>
					<?php 
						//mendapatkan id_pelanggan yg login dari session
						$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];

						$nomer=1;
						//menampilkan data sesuai id pelanggan
						$ambil=$koneksi->query("SELECT * FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan' ");
						 while ( $pecah = $ambil->fetch_assoc()) {
						 	
						 
					 ?>
					<tr>
						<td><?php echo $nomer; ?></td>
						<td><?php //echo $pecah['tanggal_pembelian']; 
							$tanggal = date('d-m-Y H:i:s', strtotime($pecah['tanggal_pembelian']));
		 					echo $tanggal; 
						?></td>
						<td><?php echo $pecah['status_pembelian']; ?>
							
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])): ?>
							Resi : <?php echo $pecah['resi_pengiriman']; ?>
						<?php endif ?>
						</td>
						<td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
						<td>
							<a class="btn btn-success" href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" >Nota</a>
							<a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Pembayaran</a>
						</td>
					</tr>
					<?php $nomer++; ?>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<pre>
		 <p>belajar format date</p>	
		 <?php 
		 $start_date = strtotime('2013-05-15 00:00:00');
		    $end_date = strtotime('2013-05-20 00:00:00');
		    $todays_date = strtotime(date("YY-MM-dd"));
		    echo  $todays_date;
		 //echo str;
	    //date_default_timezone_set('UTC');
	    	date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
		 echo '1 jam kedepan: ' . date('Y-m-d H:i:s', time() + (60 * 60)) . '<br/>';
		 $tanggal = date('d-m-Y H:i:s', strtotime($pecah['tanggal_pembelian']));
		 echo $tanggal; 
		 echo $pecah['nama_pelanggan'];
		 
		 echo "Tanggal dan Waktu sekarang adalah " . date("Y-m-d H:i:s") . "<br>";



	  		?>

	</pre>
	</section>
</body>
</html>