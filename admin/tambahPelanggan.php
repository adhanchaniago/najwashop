<h2>Tambah Pelanggan</h2>
<form method="post" >
	<div class="form-group">
		<label >Email Pelanggan</label>
		<input type="email" class="form-control" name="email">
	</div>
	<div class="form-group">
		<label >Password Pelanggan</label>
		<input type="text" class="form-control" name="password">
	</div>
	<div class="form-group">
		<label >Nama Pelanggan</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group">
		<label > Telepon</label>
		<input type="number" class="form-control" name="telepon">
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
	if (isset($_POST['save'])) {
		// $nama = $_FILES['foto']['name'];
		// $lokasi =$_FILES['foto']['tmp_name'];
		// move_uploaded_file($lokasi, "../foto_produk/" .$nama);
		$koneksi->query("INSERT INTO tb_pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon) VALUES('$_POST[email]','$_POST[password]','$_POST[nama]','$_POST[telepon]')");
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

 		echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=pelanggan'>";


	}

 ?>