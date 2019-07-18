<div class="col-md-9 ">
                <div>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Pakaian Pria</li>
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
                                 $query= "SELECT * FROM tb_produk WHERE kategori='Pakaian Pria' LIMIT $posisi, $batas  " ;
                                 $queryJml="SELECT * FROM tb_produk WHERE kategori='Pakaian Pria' ";
                                 $no = $posisi + 1;
                               }
                            }else{
                              $query= "SELECT * FROM tb_produk WHERE kategori='Pakaian Pria' LIMIT $posisi, $batas  " ;
                                 $queryJml="SELECT * FROM tb_produk WHERE kategori='Pakaian Pria' ";
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
                <!-- <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div> -->
                <!-- /.rowNYA AKHIR PAGINATION -->

                <!-- <div>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Clothing</a></li>
                        <li class="active">Men's Clothing</li>
                    </ol>
                </div> -->
                <!-- /.div -->
                <!-- <div class="row">
                    <div class="btn-group alg-right-pad">
                        <button type="button" class="btn btn-default"><strong>3005  </strong>items</button>
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
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
                </div> -->
                <!-- /.row -->
                <!-- <div class="row">
                    <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="assets/img/dummyimg.png" alt="" />
                            <div class="caption">
                                <h3><a href="#">Samsung Galaxy </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p>
                                    <a href="#" class="btn btn-success" role="button">Add To Cart</a>
                                    <a href="#" class="btn btn-primary" role="button">See Details</a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <! /.col -->
                    <!-- <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="assets/img/dummyimg.png" alt="" />
                            <div class="caption">
                                <h3><a href="#">Samsung Galaxy </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            </div>
                        </div>
                    </div> -->
                    <!-- /.col -->
                    <!-- <div class="col-md-4 text-center col-sm-6 col-xs-6">
                        <div class="thumbnail product-box">
                            <img src="assets/img/dummyimg.png" alt="" />
                            <div class="caption">
                                <h3><a href="#">Samsung Galaxy </a></h3>
                                <p>Price : <strong>$ 3,45,900</strong>  </p>
                                <p><a href="#">Ptional dismiss button </a></p>
                                <p>Ptional dismiss button in tional dismiss button in   </p>
                                <p><a href="#" class="btn btn-success" role="button">Add To Cart</a> <a href="#" class="btn btn-primary" role="button">See Details</a></p>
                            
                        </div>
                    </div>
                    
                </div> -->
                <!-- /.row -->
                <!-- <div class="row">
                    <ul class="pagination alg-right-pad">
                        <li><a href="#">&laquo;</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">&raquo;</a></li>
                    </ul>
                </div> -->
                <!-- /.row -->
               </div>
               <!-- /.col AKHIR CONTENT PRODUK(COL-MD-9)-->