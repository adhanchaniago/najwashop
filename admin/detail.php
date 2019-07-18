<h2>Detail Pembelian</h2>
<?php 
// mengambil data pd table pembelian dan tb  pelanggan
$ambil = $koneksi->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian='$_GET[id]' ");
$detail = $ambil->fetch_assoc();
 ?>
 <pre><?php print_r($detail); ?></pre>  
 <strong><?php echo $detail ['nama_pelanggan']; ?></strong>
 <p>
 	<?php echo $detail['telepon']; ?> <br>
	<?php echo $detail['email_pelanggan']; ?>
 </p>

 <p>
 	<?php echo $detail['tanggal_pembelian']; ?> <br>
 	<?php echo $detail['total_pembelian']; ?>

 </p>

 <p>Bukti Transfer : </p>
 <?php 
 	//Mengambil id pembelian dari URL
 	$id_pembel = $_GET['id'];
 	//mengambil data  pembayaran pada tb_pembayaran 
 	$dataPembayaran = $koneksi->query("SELECT * FROM  tb_pembayaran WHERE id_pembelian='$id_pembel' ");
 	$tampilkan= $dataPembayaran->fetch_assoc();

  ?>
  <div class="row">
	 <div class="col-md-6">
	 	<table class="table">
	 		<tr>
	 			<td>
	 				
	 			</td>
	 		</tr>
	 	</table>
	 </div>
	 <div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $tampilkan['bukti']; ?>" class="img-responsive">
	 	
	 </div>
 </div>
 <table class="table table-bordered" >
 	<thead bgcolor="#414CFF">
 		<tr>
 			<th>No</th>
 			<th>Nama Produk</th>
 			<th>Harga</th>
 			<th>Jumlah</th>
 			<th>Subtotal</th>
 		</tr>
 	</thead>
 	<tbody>
 		<?php $nomor=1; ?>
 		<!-- mengambil data produk dan table pembelian_produk dan seleksi data sesuai id_ pembelian-->
 		<?php $ambil=$koneksi->query("SELECT * FROM tb_pembelian_produk JOIN tb_produk ON tb_pembelian_produk.id_produk=tb_produk.id_produk WHERE tb_pembelian_produk.id_pembelian='$_GET[id]' "); ?>
 		<?php while($pecah=$ambil->fetch_assoc()){ ?>
 		<tr>
 			<td><?php echo $nomor; ?></td>
 			<td><?php echo $pecah['nama_produk']; ?></td>
 			<td><?php echo $pecah['harga_produk']; ?></td>
 			<td><?php echo $pecah['jumlah']; ?></td>
 			<td>
 				<?php echo $pecah['harga_produk'] *$pecah['jumlah'] ; ?>
 			</td>
 		</tr>
 		<?php $nomor++; ?>
 		<?php } ?>
 	</tbody>
 </table>
 