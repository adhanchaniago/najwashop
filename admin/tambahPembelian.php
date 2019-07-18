<h2>Tambah Data Pembelian</h2>

<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label >ID Pelanggan</label>
		<input type="number" class="form-control" name="id_pelanggan" required>
	</div>
	<div class="form-group">
		<label >Tanggal</label>
		<input type="date" class="form-control" name="tanggal_pembelian" required>
	</div>
	<div class="form-group">
		<label >Total</label>
		<input type="number" class="form-control" name="total_pembelian" required>
	</div>
	<button class="btn btn-primary" name="save">Simpan</button>
</form>
<?php 
	if (isset($_POST['save'])) {
		// $nama = $_FILES['foto']['name'];
		// $lokasi =$_FILES['foto']['tmp_name'];
		//move_uploaded_file($lokasi, "../foto_produk/" .$nama);
		$koneksi->query("INSERT INTO tb_pembelian (id_pelanggan,tanggal_pembelian,total_pembelian) VALUES('$_POST[id_pelanggan]','$_POST[tanggal_pembelian]','$_POST[total_pembelian]')");
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

 		echo"<meta http-equiv='refresh' content='1;url=index.php?halaman=pembelian'>";


	}

 ?>