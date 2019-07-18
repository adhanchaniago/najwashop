<?php 
	$koneksi->query("DELETE FROM tb_pelanggan WHERE id_pelanggan='$_GET[id]' ");
	echo "<script>alert('Data berhasil dihapus');</script>";
 echo "<script>location='index.php?halaman=pelanggan';</script>";
 ?>
 