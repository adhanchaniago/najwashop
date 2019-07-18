<?php  
	//session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Data Pelanggan</title>
</head>
<body>
	<h2>Data Pelanggan</h2>

	<table class="table table-bordered" >
	<thead bgcolor="#A2F4BD">
		<tr>
			<th>ID Pelanggan</th>
			<th>Email Pelanggan</th>
			<th>Password Pelanggan</th>
			<th>Nama Pelanggan</th>
			<th>Telepon</th>
			<th>Aksi</th>

		</tr>
		</thead>
		<tbody>
			<?php $nomor=1; ?>
			<?php $ambil = $koneksi ->query("SELECT * FROM tb_pelanggan"); ?>
			<?php while($pecah = $ambil ->fetch_assoc()){ ?>
			<tr>
				<td><?php echo $nomor;?></td>
				<td><?php echo $pecah['email_pelanggan']; ?></td>
				<td><?php echo $pecah['password_pelanggan']; ?></td>
				<td><?php echo $pecah['nama_pelanggan']; ?></td>
				<td><?php echo $pecah['telepon']; ?></td>
				<td>
					<a href="index.php?halaman=editPelanggan&id=<?php echo $pecah['id_pelanggan']; ?>" class="btn-warning btn">Edit</a>
					<a href="index.php?halaman=hapusPelanggan&id=<?php echo $pecah['id_pelanggan'] ?>" class="btn btn-danger">Hapus</a>
				</td>
			</tr>
			<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>

	<a href="index.php?halaman=tambahPelanggan" class="btn btn-primary">Tambah Pelanggan</a>
</body>

</html>
