<?php 
	//session_start();
	//include 'koneksi.php';
	


	function expired($id_url=null){
		include 'koneksi.php';

		//mendapatkan id_pelanggan yg login dari session
		$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];

		
		//menampilkan data tb_pembelian sesuai id pelanggan
		$ambil=$koneksi->query("SELECT * FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan' ");
		 while ( $pecah = $ambil->fetch_assoc()) {

	//===========	
			$tgl_pembelian = date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
			$tgl_expired = date('Y-m-d H:i:s', strtotime('+5 hours',strtotime($pecah['tanggal_pembelian']) ));
			$tgl_expiredDB = date('Y-m-d H:i:s', strtotime($pecah['tanggal_expired']));

		    	date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
			 $tgl_sekarang = date("Y-m-d H:i:s");
			
			if ($tgl_sekarang > $tgl_expired AND $pecah['status_pembelian']=='pending' ) {

				//TIMESTAMP(NOW());
				echo " tgl_expiredDB" .$tgl_expiredDB;
				//$koneksi->query(" SELECT @jam :='$jam' ");
				$koneksi->query(" SELECT @batas := 5 ");
				//$koneksi->query("SELECT @sum := 4 + 7");
				
				// $koneksi->query("UPDATE tb_pembelian SET status_pembelian='expired' WHERE ((status_pembelian='pending')AND('$tgl_sekarang'>'$tgl_expired'))"); //KOK SALAHYA 
				$koneksi->query("UPDATE tb_pembelian SET status_pembelian='expired' WHERE ((status_pembelian='pending')AND('$tgl_sekarang'>tanggal_expired))"); 
			}
		}

		//====== perubahan status pembelian # pending > expired = sukses

		//mengambil id pembelian pesanan yg expired
		$ambil=$koneksi->query("SELECT id_pembelian FROM tb_pembelian WHERE status_pembelian='expired' ");
		while($pilih = $ambil->fetch_assoc()){
			$id_url = $pilih['id_pembelian'];
		
			//$id_url=$_GET['id'];
			 echo " id_pembelian" .$id_url;

			 //mengambil id produk
			 // $ambil=$koneksi->query("SELECT * FROM tb_pembelian_produk  WHERE id_pembelian='$id_url' "); 
	 		// 	while($pecah=$ambil->fetch_assoc()){ 
		 	// 		$id_produk =$pecah['id_produk'];  //menampung id produk untuk dijadikan id saat update produk		 
		 	// 		echo "id_produknua ".$id_produk;
		 	// 		$jumlah =  $pecah['jumlah']; // menampung jumlah produk yg sesuai dg id produk
		 	// 		echo "jumlahnuaproduk ".$jumlah;
		 	// 		//mengembalikan produk yg tidak jadi di beli dr tb_pembelian_produk ke tb_produk
		 	// 	 	$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk + $jumlah WHERE id_produk='$id_produk' ");
		 	// 	 }
			 //echo "TANGGAL expired ". $tgl_expired;
			 if ($tgl_sekarang > $tgl_expired && $pecah['status_pembelian']=='expired' ) {//UPDATE TB PRODUK N DELETE
			//echo "sudah expired kakak";
			//echo " </br>id url nya" .$id_url;
			//$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk + $jumlah WHERE id_produk='$id_url' ");
			$ambil=$koneksi->query("SELECT * FROM tb_pembelian_produk  WHERE id_pembelian='$id_url' "); 
	 			while($pecah=$ambil->fetch_assoc()){ 
		 			$id_produk =$pecah['id_produk'];  //menampung id produk untuk dijadikan id saat update produk		 

		 			$jumlah =  $pecah['jumlah']; // menampung jumlah produk yg sesuai dg id produk
		 			//mengembalikan produk yg tidak jadi di beli dr tb_pembelian_produk ke tb_produk
		 		 	$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk + $jumlah WHERE id_produk='$id_produk' ");
		 		 }
 			//menghapus data tb_pembelian  sesuai id pembelian karena sdh expired
 		 	//$koneksi->query("DELETE FROM tb_pembelian WHERE id_pembelian='$id_url' ");
 		 	//menghapus data tb_pembelian_produk  sesuai id pembelian karena sdh expired
 		 	 //$koneksi->query("DELETE FROM tb_pembelian_produk WHERE id_pembelian='$id_url' "); 
 		 	//echo "<script>location='indee.php';</script>";
 		 	//echo "id url nya" .$id_url;
		}// BATAS

		} 
		
		// echo "<> id get id" . $_GET[id];
		//echo $id_pembeli;
		//mendapatkan id_pelanggan yg login dari session
		 //$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];

		//untuk mengambil id_produk
		// $_SESSION['keranjangnyaNOta'] = $detail;
		// foreach ($_SESSION['keranjangnyaNOta'] as $id_produk => $jumlah) {
			# code...
			// $ambil_idproduknya =$koneksi->query("SELECT * FROM tb_pembelian_produk  WHERE id_pembelian='$_GET[id]' ");
		// $detail =$ambil_idproduknya->fetch_assoc();
		// $id_produku=$detail['id_produk'];
		// $jumlahu = $detail['jumlah'];
		// echo "idnya". $id_produk;
		// echo "jmlnya". $jumlah;

			// $koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk - $jumlah WHERE id_produk='$id_produk' ");
		// }





	//untuk mengambil tanggal pembelian
	// $ambil=$koneksi->query("SELECT * FROM tb_pembelian WHERE id_pembelian='$id_url' ");
	// $pecah = $ambil->fetch_assoc();


	// $tgl_pembelian = date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
	// $tgl_expired = date('Y-m-d H:i:s', strtotime('+5 hours',strtotime($pecah['tanggal_pembelian']) ));
	// //$jangka_waktu = strtotime('+4 days', strtotime($tgl_mulai));
	// //date_default_timezone_set('UTC');
 //    	date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
	//  $tgl_sekarang = date("Y-m-d H:i:s");
	//  echo "tgl sekarang : ".$tgl_sekarang."</br>";
	//  echo "tgl pembelian : ".$tgl_pembelian."</br>";
	//  echo "tgl expired : ".$tgl_expired."</br>";
		
		

		//elseif ($pecah['status_pembelian']=='pending') {
		// 	echo "Pesanan berhasil dibuat, segera lakukan pembayaran ya kak ";
		// }
		// else{
		// 	echo "Terimakasih kak sudah melakukan pembayaran";
		// }
	}

 ?>