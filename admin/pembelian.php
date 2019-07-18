
	<h2>Data Pembelian</h2>

	<table class="table table-bordered" >
	<thead bgcolor="#BBFCFF">
		<tr>
			<th>No</th>
			<th>Nama Pelanggan </th>
			<th>Tanggal</th>
			<th>Status Pembelian</th>
			<th>Total </th>
			<th>Aksi</th>

		</tr>
	</thead>
	<tbody>
		<?php $nomor=1; ?>
		<?php $ambil = $koneksi ->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan"); ?>
		<?php while($pecah = $ambil ->fetch_assoc()){ ?>
		<tr>
			<td><?php echo $nomor;?></td>
			<td><?php echo $pecah['nama_pelanggan']; ?></td>
			<td><?php echo $pecah['tanggal_pembelian']; ?></td>
			<td>

				<!-- <?php //echo $pecah['status_pembelian']; ?> -->
				<?php 
					if ($pecah['status_pembelian']=='sudah kirim pembayaran') {
						echo "<span class='btn btn-oren'>Sudah kirim pembayaran</span>";
						//echo "<div class='btn btn-oren'>Resi : ".$pecah['resi_pengiriman']."</div>";

					}elseif ($pecah['status_pembelian']=='barang dikirim') {
						echo "<span class='btn btn-biru'>Barang  dikirim </span>";
						echo "<span class='btn btn-biru'>Resi : ".$pecah['resi_pengiriman']."</span>";
					}else{
						echo $pecah['status_pembelian'];
					}
				 ?>
					
				
			</td>
			<td><?php echo $pecah['total_pembelian']; ?></td>
			<td>
				<a href="index.php?halaman=detail&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-info btn">Detail</a>
				<?php if ($pecah['status_pembelian']=='sudah kirim pembayaran' OR $pecah['status_pembelian']=='pending') : ?>
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['id_pembelian']; ?>" class="btn-warning btn">Pembayaran</a>
				<?php endif ?>
			</td>
		</tr>
		<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>



<!-- <a href="index.php?halaman=tambahPembelian" class="btn btn-primary">Tambah Daftar Pembelian</a> -->