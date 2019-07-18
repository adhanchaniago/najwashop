
<!-- <html>
	<head>
		<link rel="stylesheet" href="css/tambahan/bootstrap.css" media="screen">
	    <link rel="stylesheet" href="css/tambahan/custom.min.css">
	    <link rel="stylesheet" href="css/tambahan/material-icons.css">
	    <link rel="stylesheet" href="css/tambahan/modification.css">
	    <link href="css/jumbotron.css" rel="stylesheet">

	</head>
<body> -->
	<h2>Tambah Produk</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label >nama</label>
		<input type="text" class="form-control" name="nama" required>
	</div>
	<div class="form-group">
		<label >Harga (Rp)</label>
		<input type="number" class="form-control" name="harga" required>
	</div>
	<div class="form-group">
		<label >Berat (Gr)</label>
		<input type="number" class="form-control" name="berat" required>
	</div>
	<div class="form-group">
		<label >Stok</label>
		<input type="number" class="form-control" name="stok" required>
	</div>
	<div class="form-group">
		<label >Deskripsi</label><br>
		<textarea class="form-control" name="deskripsi"  rows="10" required></textarea>
	</div>
	<div class="form-group">
		<label >Foto</label>
		<input type="file" class="form-control" name="foto" required>
	</div>
	<div class="form-group">
 		<label >Kategori</label>
 		<select class="form-control" name="kategori" required>
 			<option value="Handphone">Handphone</option>
 			<option value="Komputer">Komputer</option>
 			<option value="Tablet">Tablet</option>
 			<option value="Pakaian Pria">Pakaian Pria</option>
 			<option value="Pakaian Wanita">Pakaian Wanita</option>
 			<option value="Pakaian Wanita">Pakaian Anak</option>
 			<option value="Aksesoris Handphone">Aksesoris Handphone</option>
 			<option value="Aksesoris Komputer">Aksesoris Komputer</option>
 			<option value="Aksesoris Pria">Aksesoris Pria</option>
 			<option value="Aksesoris Wanita">Aksesoris Wanita</option>
 			<option value="Aksesoris Anak">Aksesoris Anak</option>
 			<option value="Donat">Donat</option>
 			<option value="Kue Ulang Tahun">Kue Ulang Tahun</option>

 		</select>
 		<!-- <input type="text" class="form-control" name="resi"> -->
 	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
	if (isset($_POST['save'])) {
		$nama = $_FILES['foto']['name'];
		$lokasi =$_FILES['foto']['tmp_name'];
		move_uploaded_file($lokasi, "../foto_produk/" .$nama);
		$koneksi->query("INSERT INTO tb_produk (nama_produk,harga_produk,berat,foto_produk,deskripsi_produk,stok_produk,kategori) VALUES('$_POST[nama]','$_POST[harga]','$_POST[berat]','$nama','$_POST[deskripsi]','$_POST[stok]','$_POST[kategori]')");
		 echo "<div class='alert alert-info'>Data berhasil disimpan</div>";	
		echo "<script type='text/javascript'>
      		alert('Sukses! Data berhasil disimpan');
    		</script>";
		// echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
		// 										  	Data berhasil disimpan
		// 										  	<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
		// 										    	<span aria-hidden='true'>&times;</span>
		// 										  	</button>
		// 										</div>
		// ";

 		echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=produk'>";


	}

 ?>
	
		<!-- <script src="js/tambahan/jquery.min.js"></script>
	    <script src="js/tambahan/popper.min.js"></script>
	    <script src="js/tambahan/bootstrap.js"></script>
	    <script src="js/tambahan/custom.js"></script> 
	    <script src="jquery-1.10.2.min.js"></script>
</body>
</html> -->