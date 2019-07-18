<div class="col-md-9 ">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Komputer</li>
                    </ol>
                </div>
               
                <!-- AWAL SORTING -->
                <div class="row">
                    <div class="btn-group alg-right-pad">
                        <!-- <a href="" class="btn btn-default btn-xl"><strong>Segarkan</strong></i></a> -->
                        <a href="" class="btn btn-default btn-md"><strong><i class="fa fa-refresh"></i> Refresh</strong></a>&nbsp;
                        <!-- <button type="button" class="btn btn-default btn-xs"><strong>1235  </strong>items</button> -->
                        <div class="btn-group">
                            <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                                Sort Products &nbsp;
                                <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="#">By Price Low</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Price High</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Popularity</a></li>
                                <li class="divider"></li>
                                <li><a href="#">By Reviews</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- /.row  AKHIR SORTING-->
                <!-- AWAL BUNGUS ROW PERPRODUK -->
                <div class="row">
                    <?php 
                              // ==pagination ===
                            $batas = 12;
                            $hal = @$_GET['hal'];
                            //print_r($hal);
                            if (empty($hal)) {
                             $posisi=0;
                             $hal=1;
                            }else{
                             $posisi = ($hal - 1) * $batas;
                            }
                            $no=1;
                            if($_SERVER['REQUEST_METHOD'] == "POST"){
                             $pencarian =trim(mysqli_escape_string($koneksi, $_POST['pencarian']));
                               if($pencarian !==' ') {
                                 $sql = "SELECT * FROM tb_produk WHERE nama_produk LIKE '%$pencarian%' "; //pr 2 clause
                                 $query = $sql;
                                 $queryJml=$sql;
                               }else{
                                 $query= "SELECT * FROM tb_produk WHERE kategori='Komputer' LIMIT $posisi, $batas  " ;
                                 $queryJml="SELECT * FROM tb_produk WHERE kategori='Komputer' ";
                                 $no = $posisi + 1;
                               }
                            }else{
                              $query= "SELECT * FROM tb_produk WHERE kategori='Komputer' LIMIT $posisi, $batas  " ;
                                 $queryJml="SELECT * FROM tb_produk WHERE kategori='Komputer' ";
                                 $no = $posisi + 1;
                            }

                              //print_r($posisi);
                                
                                $sql_produk = mysqli_query($koneksi, $query) or die(mysqli_error($conn));
                                if (mysqli_num_rows($sql_produk) > 0) {
                                    while($perproduk = mysqli_fetch_array($sql_produk)) { 
                    ?>

                                  
                                  <div class="col-md-4 text-center col-sm-6 col-xs-6">
                                      <div class="thumbnail product-box">
                                          <img  src="foto_produk/<?  echo $perproduk['foto_produk']; ?>" >
                                          <div class="caption">
                                              <p><?php echo $perproduk['nama_produk']; ?></p>
                                              <p>Rp.<?php echo number_format($perproduk['harga_produk']); ?></p>
                                              <?php if ($perproduk['stok_produk']<1): ?>
                                                  <p>Stok : Habis</p>
                                                <?php else: ?>
                                                  <p>Stok : <?php echo $perproduk['stok_produk']; ?></p>
                                              <?php endif ?>

                                              <!-- <h5>Stok : <?php //echo $perproduk['stok_produk']; ?></h5> -->
                                              <a href=" beli.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-primary"><strong>Beli</strong></a>
                                              <a href=" detail.php?id=<?php echo $perproduk['id_produk']; ?>" class="btn btn-success">Detail</a>
                                              
                                          </div>
                                      </div>
                                  </div>
                                  <?php }
                                  }else{
                                   echo "<tr><td colspan=\"4\" align=\"center\">Data tidak ditemukan</td></tr>";
                                   echo "Data tidak ditemukan";
                                   } ?>

                                   
              </div>
                <!-- /.row AKHIR BUNGKUS PER PRODUK-->
                <!-- AWAL ROWNYA PAGINATION  -->
                <div class="row">
                  <?php 
                  // if ($_POST['pencarian'] !=" ") {
                  $_POST['pencarian']="";
                                    
                     if($_POST['pencarian'] != ' ') {  ?>
                       <div style="float:left;">
                           <?php
                           $jml = mysqli_num_rows(mysqli_query($koneksi,$queryJml));
                           echo "Jumlah Data : <b>$jml</b>";
                           ?>
                        </div>
                        <div style="float:right;">
                          <ul class="pagination pagination-sm" style="margin: 0 ">
                            <?php 
                                $jml_hal = ceil($jml / $batas); 
                                for ($i=1; $i <= $jml_hal; $i++) { 
                                  if($i != $hal){
                                    echo "<li><a href=\"?hal=$i\">$i</a></li>";
                                  }else{
                                    echo "<li class=\"active \"><a>$i</a></li>";
                                  }
                                }
                             ?>
                          </ul>
                        </div>  
                      <?php

                     
                   }else{
                      echo "<div style=\"float: left;\">";
                        
                        $jml = mysqli_num_rows(mysqli_query($koneksi, $queryJml));
                        echo "Data Hasil pencarian : <b>$jml</b>";
                        echo "</div>";
                  }
                 ?>
                </div>
                
               </div>
               <!-- /.col AKHIR CONTENT PRODUK(COL-MD-9)-->