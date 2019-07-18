<!-- navbar -->


<nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php"><strong>Najwa</strong> Shop</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">


                <ul class="nav navbar-nav navbar-right">
                    <li><a href="keranjang.php">Keranjang</a></li>
                    <!-- 	//jk sudah login || ada session -->
		<?php 
			if (isset($_SESSION['pelanggan'])): ?>
				<li><a href="riwayat.php">Riwayat Belanja</a></li>
				<li><a href="logout.php">Logout</a></li>
			
		<!--/jika belum login || belum ada session  -->
		<?php else: ?>
                    <li><a href="login.php">Login</a></li>
                    <li><a href="daftar.php">Daftar</a></li>
                    <?php endif ?>
                    <li><a href="checkout.php">Checkout</a></li>

                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">24x7 Support <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#"><strong>Call: </strong>+09-456-567-890</a></li>
                            <li><a href="#"><strong>Mail: </strong>info@yourdomain.com</a></li>
                            <li class="divider"></li>
                            <li><a href="#"><strong>Address: </strong>
                                <div>
                                    234, New york Street,<br />
                                    Just Location, USA
                                </div>
                            </a></li>
                        </ul>
                    </li> -->
                </ul>
                <form class="navbar-form navbar-right" role="search" method="post">
                    <div class="form-group">
                        <input type="text" name="pencarian" placeholder=" Mau beli apa ...?" class="form-control">
                    </div>
                    &nbsp; 
                    <div class="form-group">
                        <button type="submit"  class="btn btn-primary">Search</button>
                      
                    </div>
                </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>