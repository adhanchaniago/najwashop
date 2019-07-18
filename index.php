  <?php 
    session_start();
    $koneksi = new mysqli("localhost","root","","najwa_shop");
    // echo "<pre>";
    // print_r($_SESSION);
    // echo "</pre>";
  //error_reporting(0);
    include"menu.php";
    include "batas_expired.php"; // utk mencek pesanan yg sudah expired (jadi triger)
    expired();
   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NajwaShop</title>
    
    <!-- <link id="callCss" rel="stylesheet" href="admin/css/bootstrap.min.css" media="screen"/> -->
    <!-- <link href="admin/css/themes/base.css" rel="stylesheet" media="screen"/> -->
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
    <!-- <link href="admin/css/themes/bootstrap.min.css" rel="stylesheet" media="screen"/> -->
    
</head>
<body>
    <!-- MULAI ISI / CONTENT -->
    <div class="container">
        <div class="row">
            <!--MULAI CAROSEL  -->
               <div id="carouselBlk">
                 <div id="myCarousel" class="carousel slide">
                   <div class="carousel-inner">
                     <div class="item active">
                     <div class="container">
                     <a href="daftar.php"><img style="width:100%" src="admin/images/carousel/1.png" alt="special offers"/></a>
                     <div class="carousel-caption">
                         <h4>Second Thumbnail label</h4>
                         <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                       </div>
                     </div>
                     </div>
                     <div class="item">
                     <div class="container">
                     <a href="daftar.php"><img style="width:100%" src="admin/images/carousel/2.png" alt=""/></a>
                       <div class="carousel-caption">
                         <h4>Second Thumbnail label</h4>
                         <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                       </div>
                     </div>
                     </div>
                     <div class="item">
                     <div class="container">
                     <a href="daftar.php"><img src="admin/images/carousel/3.png" alt=""/></a>
                     <div class="carousel-caption">
                         <h4>Second Thumbnail label</h4>
                         <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                       </div>
                     
                     </div>
                     </div>
                      <div class="item">
                      <div class="container">
                     <a href="daftar.php"><img src="admin/images/carousel/4.png" alt=""/></a>
                     <div class="carousel-caption">
                         <h4>Second Thumbnail label</h4>
                         <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                       </div>
                      
                     </div>
                     </div>
                      <!-- <div class="item">
                      <div class="container">
                     <a href=""><img src="admin/images/carousel/5.png" alt=""/></a>
                     <div class="carousel-caption">
                         <h4>Second Thumbnail label</h4>
                         <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                     </div>
                     </div>
                     </div> -->
                      <!-- <div class="item">
                        <div class="container">
                          <a href=""><img src="admin/images/carousel/6.png" alt=""/></a>
                       <div class="carousel-caption">
                           <h4>Second Thumbnail label</h4>
                           <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
                         </div>
                       </div>
                     </div> -->
                   </div>
                   <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
                   <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
                   </div> 
               </div>
            <!--AKHIR CAROSEL  -->
         </div>
        <!-- akhir rownya carousel -->

        <!-- /.row sidebar -->
       
        <div class="row">
            <!-- awal sidebar -->
            <div id="sidebar" class="col-md-3 " > 

                <div class="sidebar-success ">
                  <?php 
                     // $hitung_stok = "SELECT COUNT()";
                     $query_P_Pria="SELECT kategori FROM tb_produk WHERE kategori='Pakaian Pria' ";
                     $query_P_Wanita="SELECT kategori FROM tb_produk WHERE kategori='Pakaian Wanita' ";
                     $query_P_Anak="SELECT kategori FROM tb_produk WHERE kategori='Pakaian Anak' ";
                     $sql_produk_Pria = mysqli_query($koneksi, $query_P_Pria) or die(mysqli_error($koneksi));           
                     $sql_produk_Wanita = mysqli_query($koneksi, $query_P_Wanita) or die(mysqli_error($koneksi));           
                     $sql_produk_Anak = mysqli_query($koneksi, $query_P_Anak) or die(mysqli_error($koneksi));           
                     $jumlah_item_Pria=mysqli_num_rows($sql_produk_Pria);
                     $jumlah_item_Wanita=mysqli_num_rows($sql_produk_Wanita);
                     $jumlah_item_Anak=mysqli_num_rows($sql_produk_Anak);
                     // =$stok_produk * $total_kategori;
                   ?>
                    <li class="list-group subMenu open"><a href="" class=" list-group-item ">Pakaian</a>
                        <ul>
                           <li class="list-group-item"><a href="index.php?halaman=pakaianPria"><span id="biasa">Pakaian Pria</span></a>
                                <span class="label label-danger pull-right"><?php echo $jumlah_item_Pria; ?></span>
                           </li>
                           <li class="list-group-item"><a href="index.php?halaman=pakaianWanita"><span id="biasa">Pakaian Wanita</span></a>
                                <span class="label label-info pull-right"><?php echo $jumlah_item_Wanita; ?></span>
                           </li>
                           <li class="list-group-item"><a href="index.php?halaman=pakaianAnak"><span id="biasa">Pakaian Anak</span></a>
                                <span class="label label-primary pull-right"><?php echo $jumlah_item_Anak; ?></span>
                           </li>

                        </ul>
                     </li>
                </div>
                <div class="sidebar-danger">
                     <?php 
                     // $hitung_stok = "SELECT COUNT()";
                     $query_Handphone="SELECT kategori FROM tb_produk WHERE kategori='Handphone' ";
                     $query_Komputer="SELECT kategori FROM tb_produk WHERE kategori='Komputer' ";
                     $query_Tablet="SELECT kategori FROM tb_produk WHERE kategori='Tablet' ";
                     $sql_produk_Handphone = mysqli_query($koneksi, $query_Handphone) or die(mysqli_error($koneksi));           
                     $sql_produk_Komputer = mysqli_query($koneksi, $query_Komputer) or die(mysqli_error($koneksi));           
                     $sql_produk_Tablet= mysqli_query($koneksi, $query_Tablet) or die(mysqli_error($koneksi));           
                     $jumlah_item_Handphone=mysqli_num_rows($sql_produk_Handphone);
                     $jumlah_item_Komputer=mysqli_num_rows($sql_produk_Komputer);
                     $jumlah_item_Tablet=mysqli_num_rows($sql_produk_Tablet);
                     // =$stok_produk * $total_kategori;
                   ?>
                    <li class="list-group subMenu "><a href="" class="list-group-item active">Elektronik
                    </a>
                       <ul style="display:none">
                           <li class="list-group-item"><a href="index.php?halaman=Handphone"><span id="biasa">Handphone</span></a>
                                <span class="label label-danger pull-right"><?php echo $jumlah_item_Handphone; ?></span>
                           </li>
                           <li class="list-group-item"><a href="index.php?halaman=Komputer"><span id="biasa">Komputer</span></a>
                                <span class="label label-info pull-right"><?php echo $jumlah_item_Komputer; ?></span>
                           </li>
                           <li class="list-group-item"><a href="index.php?halaman=Tablet"><span id="biasa">Tablet</span></a>
                                <span class="label label-primary pull-right"><?php echo $jumlah_item_Tablet; ?></span>
                           </li>
                       </ul>
                    </li>
                </div>
                <!-- /.div -->
                <!-- /.div -->
                <div class="sidebar-success">
                  <?php 
                     $query_ak_pria="SELECT kategori FROM tb_produk WHERE kategori='Aksesoris Pria' ";
                     $query_ak_Wanita="SELECT kategori FROM tb_produk WHERE kategori='Aksesoris Wanita' ";
                     $query_ak_anak="SELECT kategori FROM tb_produk WHERE kategori='Aksesoris Anak' ";
                     $query_ak_hp="SELECT kategori FROM tb_produk WHERE kategori='Aksesoris Handphone' ";
                     $query_ak_kom="SELECT kategori FROM tb_produk WHERE kategori='Aksesoris Komputer' ";

                     $sql_ak_pria = mysqli_query($koneksi, $query_ak_pria) or die(mysqli_error($koneksi));           
                     $sql_ak_wan = mysqli_query($koneksi, $query_ak_Wanita) or die(mysqli_error($koneksi));           
                     $sql_ak_anak= mysqli_query($koneksi, $query_ak_anak) or die(mysqli_error($koneksi)); 
                     $sql_ak_hp= mysqli_query($koneksi, $query_ak_hp) or die(mysqli_error($koneksi));           
                     $sql_ak_kom= mysqli_query($koneksi, $query_ak_kom) or die(mysqli_error($koneksi));     

                     $jumlah_ak_pria=mysqli_num_rows($sql_produk_Handphone);
                     $jumlah_ak_wan=mysqli_num_rows($sql_produk_Komputer);
                     $jumlah_ak_anak=mysqli_num_rows($sql_produk_Tablet);
                     $jumlah_ak_hp=mysqli_num_rows($sql_produk_Komputer);
                     $jumlah_ak_kom=mysqli_num_rows($sql_produk_Tablet);
                   ?>
                  <li class="list-group subMenu "><a href="" class="list-group-item success ">Aksesoris</a>
                    <ul style="display: none">
                        <li class="list-group-item"><a href="index.php?halaman=Aksesoris_Pria"><span id="biasa">Aksesoris Pria</span></a>
                             <span class="label label-danger pull-right"><?php echo $jumlah_ak_pria; ?></span>
                        </li>
                        <li class="list-group-item"><a href="index.php?halaman=Aksesoris_Wanita"><span id="biasa">Aksesoris Wanita</span></a>
                             <span class="label label-info pull-right"><?php echo $jumlah_ak_wan; ?></span>
                        </li>
                        <li class="list-group-item"><a href="index.php?halaman=Aksesoris_Anak"><span id="biasa">Aksesoris Anak</span></a>
                             <span class="label label-primary pull-right"><?php echo $jumlah_ak_anak; ?></span>
                        </li><li class="list-group-item"><a href="index.php?halaman=Aksesoris_Handphone"><span id="biasa">Aksesoris Handphone</span></a>
                             <span class="label label-danger pull-right"><?php echo $jumlah_ak_hp; ?></span>
                        </li>
                        <li class="list-group-item"><a href="index.php?halaman=Aksesoris_Komputer"><span id="biasa">Aksesoris Komputer</span></a>
                             <span class="label label-info pull-right"><?php echo $jumlah_ak_kom; ?></span>
                        </li>
                    </ul>
                    </li>
                </div>
                <!-- /.div -->
                <div class="sidebar-danger">
                  <?php 
                     $query_Donat="SELECT kategori FROM tb_produk WHERE kategori='Donat' ";
                     $query_ultah="SELECT kategori FROM tb_produk WHERE kategori='Kue Ulang Tahun' ";
                     $sql_Donat = mysqli_query($koneksi, $query_Donat) or die(mysqli_error($koneksi));           
                     $sql_ultah = mysqli_query($koneksi, $query_ultah) or die(mysqli_error($koneksi));           
                     $jumlah_item_Donat=mysqli_num_rows($sql_Donat);
                     $jumlah_item_kue_ultah=mysqli_num_rows($sql_ultah);
                   ?>
                    <li class="list-group subMenu "><a href="" class="list-group-item success ">Aneka Kue</a>
                       <ul style="display:none">

                           <li class="list-group-item"><a href="index.php?halaman=Donat"><span id="biasa">Donat</span></a>
                                <span class="label label-danger pull-right"><?php echo $jumlah_item_Donat; ?></span>
                           </li>
                           <li class="list-group-item"><a href="index.php?halaman=Kue_Ulang_Tahun"><span id="biasa">Kue Ulang Tahun</span></a>
                                <span class="label label-info pull-right"><?php echo $jumlah_item_kue_ultah; ?></span>
                           </li>
                       </ul>
                     </li>
                </div>
                <!-- <div>
                    <ul class="list-group">
                        <li class="list-group-item list-group-item-success"><a href="#">New Offer's Coming </a></li>
                        <li class="list-group-item list-group-item-info"><a href="#">New Products Added</a></li>
                        <li class="list-group-item list-group-item-warning"><a href="#">Ending Soon Offers</a></li>
                        <li class="list-group-item list-group-item-danger"><a href="#">Just Ended Offers</a></li>
                    </ul>
                </div> -->
                <!-- /.div -->
                <!-- <div class="well well-lg offer-box offer-colors">


                    <span class="glyphicon glyphicon-star-empty"></span>25 % off  , GRAB IT                 
              
                   <br />
                    <br />
                    <div class="progress progress-striped">
                        <div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"
                            style="width: 70%">
                            <span class="sr-only">70% Complete (success)</span>
                            2hr 35 mins left
                        </div>
                    </div>
                    <a href="#">click here to know more </a>
                </div> -->
                <!-- /.div -->
            </div>
            <!-- /.col akhir sidebar -->

            <!-- AWAL CONTEN PRODUK -->
            <!-- <div class="span9">     
         <div class="well well-small">
         <h4>Featured Products <small class="pull-right">200+ featured products</small></h4>
         <div class="row-fluid">
         </div></div></div> -->
         <!-- ==== ==================== HOME ============================= -->
               <?php 
                  if (isset($_GET['halaman'])) 
                  {
                     if ($_GET['halaman']=="pakaianPria") 
                     {
                        include "pakaianPria.php";
                     }
                     elseif ($_GET['halaman']=="pakaianWanita") {
                        include "pakaianWanita.php";
                     }
                     elseif ($_GET['halaman']=='pakaianAnak') {
                        include "pakaianAnak.php";
                     }
                     elseif ($_GET['halaman']=='Handphone') {
                        include "handphone.php";
                     }
                     elseif($_GET['halaman']=='Komputer'){
                        include 'komputer.php';
                     }
                     elseif ($_GET['halaman']=='Tablet') {
                        include 'tablet.php';
                     }
                     elseif ($_GET['halaman']=='Aksesoris_Pria') {
                        include 'aksesorisPria.php';
                     }
                     elseif ($_GET['halaman']=='Aksesoris_Wanita') {
                        include 'aksesorisWanita.php';
                     }
                     elseif ($_GET['halaman']=='Aksesoris_Anak') {
                        include 'aksesorisAnak.php';
                     }
                     elseif ($_GET['halaman']=='Aksesoris_Handphone') {
                        include 'aksesorisHP.php';
                     }
                     elseif ($_GET['halaman']=='Aksesoris_Komputer') {
                        include 'aksesorisKomputer.php';
                     }elseif ($_GET['halaman']=='Donat') {
                        include 'donat.php';
                     }
                     elseif ($_GET['halaman']=='Kue_Ulang_Tahun') {
                        include 'kue_ultah.php';
                     }
                  }
                  else{
                     include 'home.php';
                  }
                  
                ?>   
            <!-- BATAS CONTENT -->
           </div>
           <!-- /.row  AKHIR YG PALING AWAL-->
    </div>
    <!-- /.container -->
    
    <div class="col-md-12 download-app-box text-center">

        <span class="glyphicon glyphicon-shop"></span>Belanja Yukkkkk!! ^^ <!-- <a href="#" class="btn btn-danger btn-lg">DOWNLOAD  NOW</a> -->

    </div>l

    <!--Footer -->
    <div class="col-md-12 footer-box">

        <div class="row small-box ">
            <strong>Pakaian :</strong> <a href="#">Pakaian Pria</a> |  <a href="#">Pakaian Wanita</a> | <a href="#">Pakaian Anak</a>
            | Lihat Semua item
         
        </div>
        <div class="row small-box ">
            <strong>Aneka Kue :</strong> <a href="#">Kue Ulang Tahun</a> |  <a href="#">Donat</a> | <a href="#">dll</a>
            | Lihat Semua item
         
        </div>
        <div class="row small-box ">
            <strong>Mobiles :</strong> <a href="#">Samsung</a> |  <a href="#">Sony</a> | <a href="#">Xiaomi</a> | <a href="#">Asus</a> |<a href="#">Acer</a> |<a href="#">Nokia</a> |<a href="#">Motorola</a>
            | Lihat Semua item
         
        </div>
        <div class="row small-box ">
            <strong>Laptops :</strong> <a href="#">Samsung</a> |  <a href="#">Sony</a> | <a href="#"> Asus</a> | 
            <a href="#">Toshiba</a> |  <a href="#">Acer</a> | <a href="#">Hp</a> | Lihat semua item.
        </div>
        <div class="row small-box ">
            <strong>Tablets : </strong><a href="#">Samsung</a> |  <a href="#">Sony Tablets</a> | <a href="#">Xiaomi</a> | 
            <a href="#">Toshiba </a>|  <a href="#">Acer</a>|  Lihat semua item.
            
        </div>
        <div class="row small-box pad-botom ">
            <strong>Komputer :</strong> <a href="#">Samsung</a> |  <a href="#">IBM</a> | <a href="#">Toshiba</a> | 
            <a href="#">Komputer Rakitan</a> | Lihat semua item.
            
        </div>
        <div class="row">
            <div class="col-md-4">
                <strong>Kritik dan Saran</strong>
                <hr>
                <form>
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Nama">
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <input type="text" class="form-control" required="required" placeholder="Email">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <textarea name="message" id="message" required="required" class="form-control" rows="3" placeholder="Kritik atau Saran"></textarea>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Kirim</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-md-4">
                <strong>Alamat</strong>
                <hr>
                <p>
                     Jl. Megang Sakti no. 212<br />
                                    Megang Sakti 2, Kec Megang Sakti Kab. Musi Rawas<br />
                    Telp: 021 12345<br>
                    Email: info@najwashop.com<br>
                </p>
            </div>
            <div class="col-md-4 social-box">
                <strong>Kepoin Yukk </strong>
                <hr>
                <a href="www.facebook.com"><i class="fa fa-facebook-square fa-3x "></i></a>
                <a href="www.twitter.com"><i class="fa fa-twitter-square fa-3x "></i></a>
                <a href="www.google-plus.com"><i class="fa fa-google-plus-square fa-3x c"></i></a>
                <a href="www.instagram.com"><i class="fa fa-instagram-square fa-3x "></i></a>
                <a href="www.pinterest.com"><i class="fa fa-pinterest-square fa-3x "></i></a>
                <p>
                     Jangan sampai kehabisan produk - produk favoritmu^^.
                </p>
            </div>
        </div>
        <hr>
    </div>
    <!-- /.col -->
    <div class="col-md-12 end-box text-center">
        &copy; 2018 | &nbsp;  www.najwashop.com | Dibangun dengan  <i class="fa fa-heart "></i>
    </div>
    <!-- /.col -->
    <!--Footer end -->
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
    <script>
        $(function () {

            $('#mi-slider').catslider();

        });
		</script>
</body>
</html>
