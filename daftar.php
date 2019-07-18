<?php 
session_start();
include "koneksi.php"; ?>
<!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<!-- Bootstrap core CSS -->
	    <link href="admin/css/bootstrap.css" rel="stylesheet">
	    <!-- Fontawesome core CSS -->
	    <link href="assets/css/font-awesome.min.css" rel="stylesheet" />
	    <!--GOOGLE FONT -->
	    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	    <!--Slide Show Css -->
	    <!-- <link href="assets/ItemSlider/css/main-style.css" rel="stylesheet" /> -->
	    <!-- custom CSS here -->
	    <link href="assets/css/style.css" rel="stylesheet" />
	    <!-- B -->
	    <!-- <link id="callCss" rel="stylesheet" href="admin/css/themes/bismillah.min.css" media="screen"/> -->
	    <link id="callCss" rel="stylesheet" href="admin/css/themes/carousel.min.css" media="screen"/>
	    <link href="admin/css/themes/base.css" rel="stylesheet" media="screen"/>
</head>
<body>
	<?php include "menu2.php"; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2" >
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h3 class="panel-title">Daftar Pelanggan</h3>
						</div>
						<div class="panel-body " >
							<form method="post" class="form-horizontal">
								<div class="form-group">
									<label class="control-label col-md-3">	Nama</label>
									<div class="col-md-7">
										<input type="text" class="form-control" name="nama" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">	Email</label>
									<div class="col-md-7">
										<input type="email" class="form-control" name="email" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">	Password</label>
									<div class="col-md-7">
										<input type="password" class="form-control" name="pass" required>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">	Alamat</label>
									<div class="col-md-7">
										<textarea name="alamat" class="form-control" required></textarea>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-md-3">	Telepon/HP</label>
									<div class="col-md-7">
										<input type="number" class="form-control" name="telp" required>
									</div>
								</div>
								<div class="form-group">
									<div class="col-md-7 col-md-offset-3">
										<button class="btn btn-primary" name="daftar">Daftar</button>
									</div>
								</div>
							</form>
							
							<?php 
								if (isset($_POST['daftar'])) {
									//mengambil isian nama email telepon password alamat 
									$nama = $_POST['nama'];
									$email = $_POST['email'];
									$pass = $_POST['pass'];
									$telp = $_POST['telp'];
									$alamat = $_POST['alamat'];
									
									//cek email sudah dipakai belom
									$ambil = $koneksi->query("SELECT * FROM tb_pelanggan WHERE email_pelanggan='$email' ");
									//menghitung email 
									$yangCocok = $ambil->num_rows;
									if ($yangCocok==1) {
										echo "<script>alert('maaf kak..Pendaftaran gagal ,email sudah digunakan. pakai email yg lain ya ...');</script>";
										echo "<script>location='daftar.php';</scirpt>";
									}
									else{
										//query isnert
									$koneksi->query("INSERT INTO tb_pelanggan (email_pelanggan,password_pelanggan,nama_pelanggan,telepon,alamat) VALUES('$email','$pass','$nama','$telp','$alamat')");
										echo "<script>alert('yeeaahhh!!, pendaftaran berhasil ,Happy Shooping kak ..');</script>";
										//echo "<script>location='login.php';</scirpt>";
										echo "<script>location='login.php';</script>";
									}
									
								}

							 ?>
						</div>
					</div>
					<div>
				<a href="index.php" class="btn btn-danger">Beranda</a>
				</div>
				</div>
			</div>
		</div>

    <!-- Tambahan -->
	<!--Core JavaScript file  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!--bootstrap JavaScript file  -->
    <script src="assets/js/bootstrap.js"></script>
    <!--Slider JavaScript file  -->
    <script src="assets/ItemSlider/js/modernizr.custom.63321.js"></script>
    <script src="assets/ItemSlider/js/jquery.catslider.js"></script>
      <!-- <script class="include" type="text/javascript" src="assets/js/jquery.dcjqaccordion.2.7.js"></script> -->
	

	<!-- bootshop -->
   <!-- Placed at the end of the document so the pages load faster ============================================= -->
   <script src="admin/css/themes/js/jquery.js" type="text/javascript"></script>
   <script src="admin/css/themes/js/bootstrap.min.js" type="text/javascript"></script>
   <script src="admin/css/themes/js/google-code-prettify/prettify.js"></script>
   
   <script src="admin/css/themes/js/dropdown_sidebar.js"></script>
    <script src="admin/css/themes/js/jquery.lightbox-0.5.js"></script>

   <!-- bootshop -->
</body>
</html>