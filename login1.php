<?php 
	session_start();
	// echo "<pre>";
	// print_r($_SESSION['keranjang']);
	// echo "</pre>";
	$koneksi = new mysqli("localhost","root","","najwa_shop");
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="admin/css/bootstrap.css">
	<link rel="stylesheet" href="admin/css/icon-font.min.css" type='text/css' />
	<link href="admin/css/style.css" rel='stylesheet' type='text/css' />
</head>
<body>

<!-- navbar -->
		<?php include"menu.php"; ?>


	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3 class="panel-title">Login Pelanggan</h3>
					</div>
					<div class="panel-body">
						<form method="post">
							<div class="form-group">
								<label for="">Email</label>
								<input type="email" class="form-control" name="email">
							</div>
							<div class="form-group">
								<label for="">Password</label>
								<input type="Password" class="form-control" name="pass">
							</div>
							<input type="submit" class="btn btn-primary" name="login" value="Login Kak :)">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php 
 //jika  ada tombol login dittakan , 
if (isset($_POST['login'])) {
 
	$email = $_POST['email'];
	$pass = $_POST['pass'];
	// lakukan query untuk cek validasi akun yg di db
	$ambil = $koneksi->query("SELECT * FROM tb_pelanggan WHERE email_pelanggan = '$email' AND password_pelanggan= '$pass' ");
//hitung akun yang cocok pd db
	$akunyangCocok = $ambil->num_rows;
	if ($akunyangCocok ==1) {
		echo "<script>alert('alhamdulillah .. sukses login ^_^ ');</script>";
	//	header('location:checkout.php');
		//mendapatkan akun dalam bentuk array
		$akun = $ambil->fetch_assoc();
		//Simpan dalam SESSION dengan variabel pelanggan
		$_SESSION['pelanggan'] = $akun;
		//jika sudah belanja 
		if (isset($_SESSION["keranjang"]) || !empty($_SESSION["keranjang"])) {
			echo "<script>location='checkout.php';</script>";
		}
		else{
			echo "<script>location='riwayat.php';</script>";
		}

	}
	else{
		echo "<script>alert('Login dulu ya kak.. ^_^ ');</script>";
		//header('location:login.php');
	}
}


 ?>


</body>
</html>