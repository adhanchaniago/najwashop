<h2>Edit Pelanggan</h2>

<?php 
	//session_start();
	$ambil = $koneksi->query("SELECT * FROM tb_pelanggan WHERE id_pelanggan='$_GET[id]' ");
	$pecah =$ambil->fetch_assoc();

	echo "<pre>";
	print_r($pecah);
	echo "</pre>";
 ?>
 <form method="post">
 	<div>
 		<label for="">Email Pelanggan </label>
 		<input type="email" class="form-control" name="email" value="<?php echo $pecah['email_pelanggan']; ?>">
 	</div>
 	<div>
 		<label for="">Password Pelanggan</label>
 		<input type="text" class="form-control" name="pass" value="<?php echo $pecah['password_pelanggan'] ;?>">

 	</div>
 	<div>
 		<label for="">Nama Pelanggan</label>
 		<input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama_pelanggan'] ?>">
 	</div>
 	<div>
 		<label for=""> Telepon</label>
 		<input type="number" class="form-control" name="telepon" value="<?php echo $pecah['telepon'] ?>">
 	</div>
 	<div><br>
 		<input type="submit" class="btn btn-primary" value="Edit" name="edit">
 	</div>
 	
 </form>
 <?php 
 	if (isset($_POST['edit'])) {
 		$koneksi->query("UPDATE tb_pelanggan SET email_pelanggan='$_POST[email]',password_pelanggan='$_POST[pass]', nama_pelanggan='$_POST[nama]', telepon='$_POST[telepon]' WHERE id_pelanggan='$_GET[id]' ");
 		echo " <script>alert('Data berhasil di Edit');</script>";
 	 echo "<script>location='index.php?halaman=pelanggan'</script>";
 	}
 	
  ?>
 
