<?php 
	//session_start();
	//include 'koneksi.php';
	


	function expired($id_url=null){
		include 'koneksi.php';

		//mendapatkan id_pelanggan yg login dari session
		//$id_pelanggan=$_SESSION["pelanggan"]["id_pelanggan"];

		
		//menampilkan data tb_pembelian sesuai id pelanggan
		$ambil=$koneksi->query("SELECT * FROM tb_pembelian  "); //WHERE id_pelanggan='$id_pelanggan'
		 while ( $pecah = $ambil->fetch_assoc()) {

	//===========	
			$tgl_pembelian = date('Y-m-d H:i:s', strtotime($pecah['tanggal_pembelian']));
			//$tgl_expired = date('Y-m-d H:i:s', strtotime('+5 hours',strtotime($pecah['tanggal_pembelian']) ));
			$tgl_expired = date('Y-m-d H:i:s', strtotime($pecah['tanggal_expired']));
			//$tgl_expiredDB = date('Y-m-d H:i:s', strtotime($pecah['tanggal_expired']));

		    	date_default_timezone_set('Asia/Jakarta');//set waktu asia/jakarta
			 $tgl_sekarang = date("Y-m-d H:i:s");
			
			if ($tgl_sekarang > $tgl_expired AND $pecah['status_pembelian']=='pending' ) {

				
				$koneksi->query("UPDATE tb_pembelian SET status_pembelian='expired' WHERE ((status_pembelian='pending')AND('$tgl_sekarang'>tanggal_expired))"); 
			}
		}

		//====== perubahan status pembelian # pending > expired = sukses

		//mengambil id pembelian, id_produk, jumlah pesanan yg expired dg melakukan join pd tb_pembelian dan tb_pemb_produk
		$ambil=$koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pembelian_produk ON tb_pembelian.id_pembelian=tb_pembelian_produk.id_pembelian WHERE status_pembelian='expired' ");

		while($pilih = $ambil->fetch_assoc()){
			$id_url = $pilih['id_pembelian'];
			
			//$id_url=$_GET['id'];
			 //echo " id_pembelian" .$id_url;

			 
			 $id_produk =$pilih['id_produk'];  //menampung id produk untuk dijadikan id saat update produk		 
 			
 			$jumlah =  $pilih['jumlah']; // menampung jumlah produk yg sesuai dg id produk
 			
 			//mengembalikan produk yg tidak jadi di beli dr tb_pembelian_produk ke tb_produk
 		 	$koneksi->query("UPDATE tb_produk SET stok_produk=stok_produk + $jumlah WHERE id_produk='$id_produk' ");
	 		//menghapus data tb_pembelian  sesuai id pembelian karena sdh expired
 		 	$koneksi->query("DELETE FROM tb_pembelian WHERE id_pembelian='$id_url' ");
 		 	//menghapus data tb_pembelian_produk  sesuai id pembelian karena sdh expired
 		 	 $koneksi->query("DELETE FROM tb_pembelian_produk WHERE id_pembelian='$id_url' "); 
			 

		 }
		
	}

 ?>