<?php 
	session_start();
	include "koneksi.php"; 
	include "batas_expired.php";
	//jika tidak ada session atau belum login maka harus login dulu
	if (!isset($_SESSION['pelanggan']) OR empty($_SESSION['pelanggan'])) {
		echo "<script>alert('login dulu ya kak untuk lihat notanya..');</script>";
		echo "<script>location='login.php';</script>";
	}
	
	expired();

	

?>
<!DOCTYPE html>
<html>
<head>
	<title>Riwayat Belanja</title>
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
</head>
<body>
	<?php include "menu2.php"; ?>
	
	<!-- // <pre><?php print_r($_SESSION) ?> -->
		
	</pre>
	
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
						<td>
							<?php //echo $pecah['tanggal_pembelian']; 
								$tgl_pembelian = date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
								// $tgl_expired = date('Y-m-d H:i:s', strtotime('+5 hours',strtotime($pecah['tanggal_pembelian']) ));
								$tgl_expired = date('Y-m-d H:i:s', strtotime($pecah['tanggal_expired']));
								$tgl_expiredDB = date('Y-m-d H:i:s', strtotime($pecah['tanggal_expired']));

							    	date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
								 $tgl_sekarang = date("Y-m-d H:i:s");
								 echo "tgl sekarang : ".$tgl_sekarang."</br>";
								echo "tgl pembelian : ".$tgl_pembelian."</br>";
			 					echo "tgl expired : ".$tgl_expired."</br>";

			 					//==========tes
			 					$tgl_beli = strtotime($pecah['tanggal_pembelian']);//date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
								$tgl_pembelian2 = strtotime('2018-11-7 23:00:00');//date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
								 $tgl_now = time();
								  $selisih = $tgl_now - $tgl_beli;
								  $jam   = floor($selisih / (60 * 60));
								 // echo "tglBELI" . $tgl_beli;
								  //$jam2= echo $jam2;
			 					
			 					if ($tgl_sekarang > $tgl_expired AND $pecah['status_pembelian']=='pending' ) {

			 						//TIMESTAMP(NOW());
			 						echo " tgl_expiredDB" .$tgl_expiredDB;
			 						$koneksi->query(" SELECT @jam :='$jam' ");
			 						$koneksi->query(" SELECT @batas := 5 ");
			 						//$koneksi->query("SELECT @sum := 4 + 7");
			 						
			 						// $koneksi->query("UPDATE tb_pembelian SET status_pembelian='expired' WHERE ((status_pembelian='pending')AND('$tgl_sekarang'>'$tgl_expired'))"); //KOK SALAHYA 
			 						$koneksi->query("UPDATE tb_pembelian SET status_pembelian='expired' WHERE ((status_pembelian='pending')AND('$tgl_sekarang'>tanggal_expired))"); 
			 					}elseif ($pecah['status_pembelian']=='pending') {
			 						echo "Pesanan berhasil dibuat, segera lakukan pembayaran ya kak ";
			 					}
			 					else{
			 						echo "Terimakasih kak sudah melakukan pembayaran";
			 					}
			 					
							?>
							
						</td>
						<td><?php echo $pecah['status_pembelian']; ?>
							
						<br>
						<?php if (!empty($pecah['resi_pengiriman'])): ?>
							Resi : <?php echo $pecah['resi_pengiriman']; ?>
						<?php endif ?>
						</td>
						<td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
						<td>
							<?php 
								if ($tgl_sekarang > $tgl_expired && $pecah['status_pembelian']=='expired' ) {//KOK SALAHYA 
			 						echo "aduh kakak terlambat melakukan pembayaran pesanan sudah expired kakak, Silahkan belanja kembali";
			 						// echo "<a class=\"btn btn-success\" href=\"nota.php?id=$pecah["id_pembelian"] \" >Nota</a>";
			 				?>
			 						<a class="btn btn-success" href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" >Nota</a>	
			 				
			 				<?php		//mengembalikan(INSERT) kembali stok yang sudah di chekout pd tb_pembelian

			 					}elseif ($pecah['status_pembelian']=='pending') {
			 				?>		
									<a class="btn btn-success" href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" >Nota</a>
			 						<a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn btn-info">Pembayaran</a>
			 				<?php
			 					}
			 					else{
			 				 ?>
			 						<a class="btn btn-success" href="nota.php?id=<?php echo $pecah['id_pembelian']; ?>" >Nota</a>
									
			 				<?php } ?>
							 
						</td>
					</tr>
					<?php $nomer++; ?>
					<?php } ?>
				</tbody>
			</table>
			<div>
				<!-- <button class="btn btn_primary"  >Beranda</button> -->
				<a href="index.php" class="btn btn-primary">Beranda</a>
			</div>
			<br>
		</div>
	</section>
	
	<div class="col-md-12 end-box text-center">
        &copy; 2018 | &nbsp;  www.najwashop.com | Dibangun dengan  <i class="fa fa-heart "></i>
    	</div>
	<script src="admin/css/themes/js/jquery.js" type="text/javascript"></script>
   <script src="admin/css/themes/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="admin/css/themes/js/google-code-prettify/prettify.js"></script>
   
   <script src="admin/css/themes/js/dropdown_sidebar.js"></script>
    <script src="admin/css/themes/js/jquery.lightbox-0.5.js"></script>

   <!-- bootshop -->
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>

</body>
</html>
<?php 
	
// 	$awal  = strtotime('2017-08-10 10:05:25');
// $akhir = strtotime('2017-08-11 11:07:33');
// $diff  = $akhir - $awal;

// $jam   = floor($diff / (60 * 60));
// $menit = $diff - $jam * (60 * 60);
// echo 'Waktu tinggal: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit';

//percobaan menghitung waktu mumet 
// echo "<pre>";
	// date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
	// $tgl_pembelian = strtotime('2018-11-7 21:00:00');//date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
	// $tgl_pembelian2 = strtotime('2018-11-8 06:00:00');//date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
	 // $tgl_now =  time();
	  // $selisih =  $tgl_now -  $tgl_pembelian ;
	  // $jam   = floor($selisih / (60 * 60));

	//  $menit = $selisih - $jam * (60 * 60);
	// echo ' </br>: ' . $jam .  ' jam, ' . floor( $menit / 60 ) . ' menit berlalu' ;
	// echo " <br>tgl sekarang " .$tgl_now;
	// echo " </br>tgl pembelian " .$tgl_pembelian;
	// echo " </br>tgl selisih " .$selisih;
	// $tgl_SAIKI =  $koneksi->query( " SELECT TIMESTAMP(NOW() )" );
	// echo " </br>tgl SAIKI " .$tgl_SAIKI;
	// $tgl_expired = new DateTime('now');
	// $tgl_expired->modify('+5 hours');
							// echo 	$tgl_expired->format("Y-m-d H:i:s");


	//echo "$koneksi->query('SELECT * FROM tb_pembelian WHERE id_pelanggan="$id_pelanggan" ')";


// echo "</pre>";
								 


 ?>