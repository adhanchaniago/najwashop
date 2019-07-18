<?php 
	session_start();
	$koneksi = new mysqli("localhost","root","","najwa_shop");
 ?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<!-- <meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" /> -->
	<!-- <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script> -->
	 <!-- Bootstrap Core CSS -->
	 <link href="admin/css/style.css" rel='stylesheet'   />
	 <link rel="stylesheet" href="admin/css/bootstrap.css">
	<!-- <link href="admin/css/bootstrap.min.css" rel='stylesheet' type='text/css' /> -->
	<!-- Custom CSS -->
	<!-- <link href="admin/css/style.css" rel='stylesheet' type='text/css' /> -->
	<!-- Bootstrap core CSS -->
    	<!-- <link href="admin/css/bootstrap.css" rel="stylesheet"> -->
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


	<!-- Graph CSS -->
	<!-- <link href="admin/css/font-awesome.css" rel="stylesheet">  -->
	<!-- jQuery -->
	<!-- lined-icons -->
	<!-- <link rel="stylesheet" href="admin/css/icon-font.min.css" type='text/css' /> -->
	<!-- //lined-icons -->
	<!-- chart -->
	<!-- <script src="admin/js/Chart.js"></script> -->
	<!-- //chart -->
	<!--animate-->
	<!-- <link href="admin/css/animate.css" rel="stylesheet" type="text/css" media="all"> -->
	<!-- <script src="admin/js/wow.min.js"></script> -->
		<!-- <script>
			 new WOW().init();
		</script> -->
	<!-- end-animate -->
	<!-- webfonts -->
	<!-- <link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'> -->
	<!-- webfonts -->
	 <!-- Meters graphs -->
	<!-- <script src="admin/js/jquery-1.10.2.min.js"></script> -->
	<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sign-in-up">
     <?php include"menu2.php"; ?>
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<!-- <p><span>Selamat Datang Di</span> </br> <a href="index.php">NajwaShop</a></p> -->
						</div>
						<div class="signin">
							<div class="signin-rit">
								<!-- <span class="checkbox1">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked="">Forgot Password ?</label>
								</span>
								<p><a href="#">Click Here</a> </p>
								<div class="clearfix"> </div> -->
							</div>
							<form method="post">
							<div class="log-input">
								<div class="log-input-left">
								  <!--  <input type="text" class="user" value="Yourname" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}" name="email" /> -->
								   <input type="text" class="user" name="email_pelanggan" placeholder="email kamu">
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <!-- <input type="password" class="lock" value="password" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Email address:';}"/> -->
								   <input type="password" class="lock" name="password_pelanggan" placeholder="password kamu">
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<input type="submit"  name="login" value="Masuk ">
						</form>	
						<?php 
							if (isset($_POST['login'])) {
								$ambil = $koneksi->query("SELECT * FROM tb_pelanggan WHERE email_pelanggan='$_POST[email_pelanggan]' AND password_pelanggan='$_POST[password_pelanggan]' ");
								$yangCocok = $ambil->num_rows; //menghitung data yang cocok
									if ($yangCocok==1) {
										//mendapatkan akun dalam bentuk array
										$akun = $ambil->fetch_assoc();
										//Simpan dalam SESSION dengan variabel pelanggan
										$_SESSION['pelanggan'] = $akun;
										//$_SESSION['akun'] = $ambil->fetch_assoc(); // menampung data akun
										//jika sudah belanja 
										if (isset($_SESSION["keranjang"]) || !empty($_SESSION["keranjang"])) {
											echo "<script>location='checkout.php';</script>";
										}
										else{
											echo "<script>location='index.php';</script>";
										}
										//echo "<div class='alert alert-info'>Login sukses, silahkan lanjut belanja</div>";
										//echo "<meta http-equiv='refresh' content='1;url=index.php'>";
									}
									else{
										echo "<div class='alert alert-danger'>Maaf login gagal, periksa username dan password kakak</div>";
										echo "<meta http-equiv='refresh' content='1;url=login.php'>";
									}
								
							}
						 ?> 
						</div>
						<div class="new_people">
							<h4>Belum punya akun?</h4>
							<p>Nikmati kemudahan berbelanja bersama NajwaShop</p>
							<a href="daftar.php">Daftar Sekarang!</a>
						</div>
					</div>
				</div>
			</div>
		<!--footer section start-->
			<!-- <footer>
			 <p>&copy 2018 NajwaShop. All Rights Reserved </p>
			</footer> -->
        <!--footer section end-->
	</section>
	
<script src="admin/js/jquery.nicescroll.js"></script>
<script src="admin/js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="admin/js/bootstrap.min.js"></script>

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
<?php 

 ?>