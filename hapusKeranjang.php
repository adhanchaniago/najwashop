<?php 
	session_start();
	$id_produk = $_GET['id'];
	 // menghapus data produk di keranjang dengan unset dan array
	unset($_SESSION['keranjang'][$id_produk]);

	echo "<script>alert('Produk berhasil dihapus dari keranjang');</script>";
	echo "<script>location='keranjang.php';</script>";


 ?>