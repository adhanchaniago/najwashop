<?php 
	session_start();
	include "koneksi.php";
	$id_produk = $_GET['id'];

	$ambil=$koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$id_produk' ");
	$pecah=$ambil->fetch_assoc();
	$stok=$pecah['stok_produk'];
	if ($stok>=1) {
		//JIika sudah ada produk yg dibeli dikeranjang , maka produk itu jumlahnya di +1
		if (isset($_SESSION['keranjang'][$id_produk])) {
			$_SESSION['keranjang'][$id_produk]+=1;
		}
		else{
			$_SESSION['keranjang'][$id_produk]=1;
		}

		// echo "<pre>";
		// print_r($_SESSION);
		// echo "</pre>";
		//arahkan ke halman keranjang 
		echo "<script>alert('produk telah masuk dalam keranjang belanja ')</script>";
		echo "<script>location='keranjang.php'</script>";
	}elseif($stok<1){
		echo "<script>alert('Maaf kak, produk ini sedang habis')</script>";
		echo "<script>location='index.php'</script>";
	}

	

	
 ?>