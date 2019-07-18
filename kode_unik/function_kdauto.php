function kdauto($tabel, $inisial){
	$struktur	= mysql_query("SELECT * FROM $tabel");
	$field		= mysql_field_name($struktur,0);
	$panjang	= mysql_field_len($struktur,0);
 
 	$qry	= mysql_query("SELECT max(".$field.") FROM ".$tabel);
 	$row	= mysql_fetch_array($qry); 
 	if ($row[0]=="") {
 		$angka=0;
	}
 	else {
 		$angka		= substr($row[0], strlen($inisial));
 	}
 
 	$angka++;
 	$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;
}


//pemanggilan

$kode= kdauto("pemesanan","TR-");
		$sql = "INSERT INTO pemesanan SET 
				no_pesan='".$kode."',
				uid_plg='".$_SESSION['SES_UIDPLG']."',
				tanggal='".date('Y-m-d')."',
				jam='".date('G:i:s')."',  
				status_bayar='PESAN',
				unik_transfer='".$_POST['TxtUnikH']."'";


// penyelesaian 

ini

$angka	=strval($angka); 
 	$tmp	="";
 	for($i=1; $i<=($panjang-strlen($inisial)-strlen($angka)); $i++) {
		$tmp=$tmp."0";	
	}
 	return $inisial.$tmp.$angka;


pke sprintf aj napa 
returnya balikin array saja



$panjang-=strlen($inisial);
 	return array( sprintf($inisial.'%0'.$panjang.'d', $angka), $angka % 1000 );


 	//solusi alternatif
 	$random = (rand()%999);
print("Angka acak antara 0 dan 999 adalah: $random");