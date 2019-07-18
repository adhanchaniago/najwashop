
<h2>Data Pembayaran</h2>

<?php 
// include "../koneksi.php";
//mendapatkan id_pembelian dari url
$id_pemb= $_GET['id'];

//mengambil data pembayaran berdasarkan id_pembelian
$ambil = $koneksi->query("SELECT * FROM tb_pembayaran WHERE id_pembelian='$id_pemb' ");
$pecah = $ambil->fetch_assoc();
 ?>
 <pre><?php print_r($pecah); ?></pre>
 <div class="row">
 	<div class="col-md-6">
 		<table class="table " >
 			<tr>
 				<th>Nama</th>
 				<td><?php echo $pecah['nama']; ?></td>
 			</tr>
 			<tr>
 				<th>Bank</th>
 				<td><?php echo $pecah['bank']; ?></td>
 			</tr>
 			<tr>
 				<th>Tanggal</th>
 				<td><?php echo $pecah['tanggal']; ?></td>
 			</tr>
 			<tr>
 				<th>Jumlah</th>
 				<td>Rp.<?php echo number_format($pecah['jumlah']); ?></td>
 			</tr>
 		</table>
 	</div>
 	<div class="col-md-6">
 		<img src="../bukti_pembayaran/<?php echo $pecah['bukti']; ?>" class="img-responsive">
 	</div>
 </div>

 <form method="post">
 	<div class="form-group">
 		<label >No Resi Pengiriman</label>
 		<select class="form-control" name="resi">
 			<option value="TFC-<?php echo $id_pemb; ?>">TFC-<?php echo $id_pemb; ?></option>
 			<option value="TFO-<?php echo $id_pemb; ?>">TFO-<?php echo $id_pemb; ?></option>
 		</select>
 		<!-- <input type="text" class="form-control" name="resi"> -->
 	</div>
 	<div class="form-group" >
 		<label >Status</label>
 	
 	
 		<select class="form-control" name="status">
 			
 			
 			<option value="sudah kirim pembayaran">Sudah Kirim Pembayaran</option>
 			<option value="barang dikirim">Barang Dikirim</option>
 			<!-- <option value="batal">Batal</option> -->
 		</select>
 	</div>
 	<button class="btn btn-primary" name="proses">Proses</button>
 </form>
 <?php 
 	if (isset($_POST['proses'])) {
 		$resi = $_POST['resi'];
 		$status = $_POST['status'];
 		$koneksi->query("UPDATE tb_pembelian SET status_pembelian='$status',resi_pengiriman='$resi' WHERE id_pembelian ='$id_pemb' ");

 		echo "<script>alert('Data pembelian sudah terupdate kak admin ..');</script>";
 		echo "<script>location='index.php?halaman=pembelian';</script>";

 	}


  ?>