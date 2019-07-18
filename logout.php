<?php 

session_start();
unset($_SESSION['pelanggan']); //menghilangkan session login user (1 akun saja)
//session_destroy();
echo "<script>alert('Berhasil logout ..Terimakasih kak sudah berbelanja .. jangan lewatkan promo menarik kami lainya ya kak ^_^');</script>";
echo "<script>location='index.php';</script>";
//header('location:login.php');



 ?>