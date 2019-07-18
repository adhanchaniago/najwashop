<h2>Data Produk</h2>

<table class="table table-bordered" >
	<thead bgcolor="#A2F4BD">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Harga</th>
			<th>Berat</th>
			<th>Stok</th>
			<th>Kategori</th>
			<th>Foto</th>
			<th>Aksi</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi ->query("SELECT * FROM tb_produk"); ?>
		<?php while($pecah = $ambil ->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_produk']; ?></td>
			<td><?php echo $pecah['harga_produk']; ?></td>
			<td><?php echo $pecah['berat']; ?></td>
			<td><?php echo $pecah['stok_produk']; ?></td>
			<td><?php echo $pecah['kategori']; ?></td>
			<td>
				<img src="../foto_produk/<?php echo $pecah['foto_produk']; ?>" width="80">
			</td>
			<td>
				<a href="index.php?halaman=editProduk&id=<?php echo $pecah['id_produk']; ?>" class="btn btn-warning">Edit</a>
				<a href="index.php?halaman=hapusProduk&id=<?php echo $pecah['id_produk']; ?>" class="btn-danger btn">Hapus</a>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>

<div>
	
<a href="index.php?halaman=tambahProduk" class="btn-primary btn">Tambah Produk</a>
<br>
</div>
 