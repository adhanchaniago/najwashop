<?php 
session_start();
unset($_SESSION['admin']); //menghilangkan session login user (1 akun saja)
//session_destroy(); // 
echo "<script>alert('Kamu berhasil Logout');</script>";
echo "<script>location='login.php'</script>";
?>

