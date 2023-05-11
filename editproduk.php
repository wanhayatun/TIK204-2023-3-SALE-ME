<?php 
session_start();
// if (!isset($_SESSION["login"])) {
// 	header("Location: loginpenjual.php");
// 	exit;
// }
require 'functions.php';

$id = $_GET["id"];
$product = query("SELECT * FROM product WHERE id = $id")[0];


if (isset($_POST["submit"])) {

	if(edit($_POST) > 0 ) {
		echo "
		<script>
			alert('Data Berhasil Diubah');
			document.location.href = 'indexp.php';
		</script>
		";
	} 
  //   else {
	// 	echo "
	// 	<script>
	// 		alert('Data Gagal Diubah');
	// 		document.location.href = 'indexp.php';
	// 	</script>
	// 	";
	// }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Sale Me &mdash; E-Commerce Food Waste</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Mukta:300,400,700"> 
    <link rel="stylesheet" href="fonts/icomoon/style.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
  
  <div class="site-wrap">
    <header class="site-navbar" role="banner">
      <div class="site-navbar-top">
        <div class="container">
          <div class="row align-items-center">

            <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
              <form action="" method="" class="site-block-top-search">
                <span class="icon icon-search2"></span>
                <input type="" name="" class="form-control border-0" placeholder="Search">
              </form>
            </div>

            <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
              <div class="site-logo">
                <a href="indexp.php" class="js-logo-clone"><strong>Sale Me</strong></a>
              </div>
            </div>

            <div class="col-6 col-md-4 order-3 order-md-3 text-right">
              <div class="site-top-icons">
                <ul>
                  <li><a href="loginpenjual.php"><span class="icon icon-person"></span></a></li>
                  <li><a href="logoutp.php" class="btn btn-primary text-white">logout</a></li>
                  <li class="d-inline-block d-md-none ml-md-0"><a href="#" class="site-menu-toggle js-menu-toggle"><span class="icon-menu"></span></a></li>
                </ul>
              </div> 
            </div>

          </div>
        </div>
      </div> 
      <nav class="site-navigation text-right text-md-center" role="navigation">
        <div class="container">
          <ul class="site-menu js-clone-nav d-none d-md-block">
            <li class="active">
              <a href="indexp.php">Produk</a>
            </li>
            <li>
              <a href="order.php">Order</a>
            </li>
            <!-- <li><a href="shop.php">Shop</a></li> -->
            <li><a href="contactp.php">Contact</a></li>
          </ul>
        </div>
      </nav>
    </header>
<!-- 
    <div class="site-blocks-cover" style="background-image: url(images/cover1.jpg);" data-aos="fade">
      <div class="container">
        <div class="row align-items-start align-items-md-center justify-content-end">
          <div class="col-md-5 text-center text-md-left pt-5 pt-md-0">
            <h1 class="mb-2 text-white">All Products on Discount!</h1>
            <div class="intro-text text-center text-md-left">
              <p class="mb-4 text-white">"Waste Less, Save More, Live More"</p>
              <p>
                <a href="shop.php" class="btn btn-sm btn-primary">Shop Now</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </div> -->
<!-- 
    <div class="site-section site-blocks-1">
      <div class="container">
        <div class="row">
          <div class="col-2">
            One of six columns
          </div>
          <div class="col-2">
            One of six columns
          </div>
          <div class="col-2">
            One of six columns
          </div>
          <div class="col-2">
            One of six columns
          </div>
          <div class="col-2">
            One of six columns
          </div>
          <div class="col-2">
            One of six columns
          </div>
        </div>
      </div>
    </div> -->
    
    <div class="container pt-4">
        <h2>Edit Product</h2>
        <form action="" method="POST">
        <input type="hidden" name="id" value="<?= $product["id"]; ?>">
            <div class="mb-3">
                <label for="gambar" class="form-label">Gambar Produk</label> <br>
                <img src="images/<?= $product["gambar"]; ?>" alt="" width="100px"> <br>
                <input class="form-control" type="file" name="gambar" id="gambar">
            </div>
            <div class="mb-3">
                <label for="">Nama Produk</label>
                <input class="form-control" type="text" id="nama" name="nama" required value="<?= $product["nama"] ?>">
            </div>
            <div class="mb-3">
                <label for="">Harga Produk</label>
                <input class="form-control" type="number" id="harga" name="harga" required value="<?= $product["harga"] ?>">
            </div>
            <div class="mb-3">
                <label for="">Tanggal Kadaluarsa</label>
                <input class="form-control" type="date" id="kadaluarsa" name="kadaluarsa" required value="<?= $product["kadaluarsa"] ?>">
            </div>
            
            <button type="submit" name="submit" class="btn btn-primary">Save</button>
        </form>
    </div>


    <footer class="site-footer border-top">
      <div class="container">
        <div class="row pt-1 mt-1 text-center">
          <div class="col-md-12">
            <p>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            Copyright &copy;<script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="icon-heart" aria-hidden="true"></i> by <a href="index.php" target="_blank" class="text-primary">Sale Me Team</a>
            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
            </p>
          </div>
          
        </div>
      </div>
    </footer>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>