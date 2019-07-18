<?php 
$tanggal =012409; 
$tanggal2 = '012409'; 

$bulan = substr('$tanggal', 0, 2); 
$hari = substr('$tanggal', 2, 2); 
$tahun = substr('$tanggal', -2); 

echo "$hari/$bulan/$tahun <br>";
$numlength = strlen((string)$tanggal);
printf($numlength) ;
$pus=ceil(log10($tanggal));
echo $pus;

$num = 999;
  $num2 = 1234;
  $id_pembelian = 1234567890990;
  $harga =100100;

  function digits($id_pembelian){
    return (int) (log($id_pembelian, 10) + 1);
  }
echo "<br>==========";
 
  echo "<br> jumlahnya:" . digits($id_pembelian); // 12345: 5 
  echo "\n";
  if (digits($id_pembelian)>3) {
  	$potong=substr($id_pembelian, -3);
  	echo "jumlah 13 lanjutkan <br>";
  	echo "3 angka paling belakang adalah".$potong;
  	echo "jumlah harga dan kode unik".($harga+$potong);
  }elseif (digits($id_pembelian)<=3) {
  	
  	echo "<br>harga + kode unik adalah : ".($harga+$id_pembelian);
  	        
  }

?>
 
