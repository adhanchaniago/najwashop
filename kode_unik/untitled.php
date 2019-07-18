<?php
session_start();
include_once "inc.plg.session.php";
include_once "librari/inc.koneksi.php";
include_once "librari/inc.librari.php";
include_once "librari/inc.randunik.php";


     <form action="?page=belisukses" method="post" name="form1" target="_self">
     
     
        Nama Busana
        Harga (Rp)
        Jumlah
        Total (Rp)
      
      <?php
	  //Perintah untuk menampilkan daftar belanja
	  $sql = "SELECT PS.*,PR.nm_produk, PR.file_gambar, PR.harga, KN.* 
			  FROM produk_stok PS, produk PR, kantong KN 
			  WHERE PR.kd_produk = PS.kd_produk
			  AND PS.kd_detprod=KN.kd_detprod 
			  AND KN.uid_plg='".$_SESSION['SES_UIDPLG']."'
			  ORDER BY KN.id_kantong";
		
   	  $qry = mysql_query($sql, $koneksi)
	  		or die ("Gagal Query");
	  while ($data = mysql_fetch_array($qry)){
		  	$no++;
			//Menghitung harga
			$harga = $data['harga']-(($data['harga'] * $data['diskon'])/100);
			$subtot = $harga * $data['jumlah'];
			$total = $total + $subtot;
			
			$sql_plg = "SELECT propinsi.ongkos_kirim
						FROM propinsi,pelanggan,kantong
						WHERE propinsi.kd_propinsi = pelanggan.kd_propinsi
						AND pelanggan.uid_plg=kantong.uid_plg
						AND kantong.uid_plg='".$_SESSION['SES_UIDPLG']."'";
						
			$qry_plg = mysql_query ($sql_plg, $koneksi)
				or die("Gagal Query propinsi".mysql_error());
			$hsl_plg = mysql_fetch_array($qry_plg);
				$ongkos    = $hsl_plg['ongkos_kirim'];
				$totbayar  = $total + $ongkos + 1000;
				$uang	   = substr($totbayar,0,strlen($totbayar)-3);
				$uniktrans = RandUnik('3');
				$totbayar  = $uang."".$uniktrans;
		?>
        
        	Nama Busana : <? echo "<a href='?page=busanadet&kode=$data[kd_produk]' target='_blank'>$data[nm_produk]"; ?>
			
             <? echo "Rp.".format_angka($data['harga']).",00";?>
			
            	 
                 
      	  
       
       
        <? echo "Disc ".$data['diskon']." %"; ?>
        <? echo $data['jumlah']; ?>
        <? echo "Rp. ".format_angka($subtot).",00"; ?>
       
       
           
        <? echo "Rp. ".format_angka($harga).",00"; ?>
         
          
         
         
       		 
             
             
             
             
       
	   <?php
	  	}
	  ?>
	  
      	 
        Total Belanja (Rp) : 
         <? echo "Rp. ".format_angka($total).",00"; ?> 
        
        
        	 
            Biaya Kirim (Rp.) : 
             <? echo "Rp. ".format_angka($ongkos).",00"; ?>
       
       
       	 
         Unik Transfer :
        	">
            <? echo $uniktrans; ?>
			
            
            
            	 
                Total Pembayaran (Rp.) : 
                
                 <? echo "Rp. ".format_angka($totbayar).",00"; ?> 
                
                
                 
                 
                 
                 
                
                
                 
                 
                 
                
                
                
                
                	 
                     
                     
                     
               
               
               	
                Total uang yang harus anda setorkan adalah sebesar : <? echo "Rp. ".format_angka($totbayar).",00"; ?>. Simpan Bukti pembayaran anda. 
Kami akan mengirimkan busana yang telah anda pesan ke alamat yang tertera dibawah ini :
				
                
                
                
                
                
                	 
                     
                     
                     
                
           
       
       <?php
} //akhir session
	?>