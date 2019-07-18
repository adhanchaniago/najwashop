<h2>Edit Produk</h2>
<?php 
$ambil=$koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]' ");
$pecah=$ambil->fetch_assoc();

echo "<pre>";
print_r($pecah);
echo "</pre>";

 ?>
<form method="post" enctype="multipart/form-data">
	<div class="form-group">
		<label >Nama Produk</label>
		<input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>" required>
	</div>
	<div class="form-group">
		<label >Harga Produk</label>
		<input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga_produk']; ?>" required>
	</div>
	<div class="form-group">
		<label >Berat</label>
		<input type="number" name="berat" class="form-control" value="<?php echo $pecah['berat']; ?>" required >
	</div>
	<div class="form-group">
 		<label >Kategori</label>
 		<select class="form-control" name="kategori">
 			<option value="<?php echo $pecah['kategori']; ?>"><?php echo $pecah['kategori']; ?></option>
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
	<div class="form-group">
		<label >Foto</label>
		
		<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="80">
	</div>
	<div class="form-group">
		<label >Ganti Foto</label>
		<input type="file" name="foto" class="form-control" >
	</div>
	<div class="form-group">
		<label >Deskripsi</label>
		<textarea name="deskripsi" class="form-control" rows="10"  required><?php echo $pecah['deskripsi_produk']; ?></textarea>
	</div>
	<button class="btn btn-success " name="edit">Edit</button>
</form>
<?php 
	if (isset($_POST['edit'])) {
		// $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id_produk='$_GET[id]' ");
		// $pecah = $ambil->fetch_assoc();
		//$foto_produk = $pecah['foto_produk'];
		$nama_foto = $_FILES['foto']['name'];
		$lokasiFoto = $_FILES['foto']['tmp_name'];

		if(!empty($lokasiFoto)) {
			move_uploaded_file($lokasiFoto, "../foto_produk/".$nama_foto);

			$koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]',berat='$_POST[berat]', foto_produk='$nama_foto', deskripsi_produk='$_POST[deskripsi]',kategori='$_POST[kategori]' WHERE id_produk='$_GET[id]' ") ;
		}
		else{
			$koneksi->query("UPDATE tb_produk SET nama_produk='$_POST[nama]', harga_produk='$_POST[harga]',berat='$_POST[berat]', deskripsi_produk='$_POST[deskripsi]',kategori='$_POST[kategori]' WHERE id_produk='$_GET[id]' ");
		}
		

		echo "<script>alert('Data berhasil di Update')</script>";
		echo "<script>location='index.php?halaman=produk';</script>";


	}
 ?>