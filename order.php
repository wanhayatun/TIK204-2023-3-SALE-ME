<?php 
session_start();
if (!isset($_SESSION["login"])) {
	header("Location: loginpenjual.php");
	exit;
}
require 'functions.php';

// $perhalaman = 10;
// $jumlah = count(query("SELECT * FROM product"));
// $jumlahhalaman = ceil($jumlah / $perhalaman);
// // if (isset($_GET["page"])) {
// // $halaktif = $_GET["page"];
// // } else {
// // 	$halaktif = 1;
// // }
// $halaktif = (isset($_GET["page"])) ? $_GET["page"] : 1;
// $awalproduct = ($perhalaman * $halaktif) - $perhalaman;


$product = query("SELECT * FROM pesan");

if (isset($_POST["search"])) {
	$product = search($_POST["keyword"]);
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
            <li>
              <a href="indexp.php">Produk</a>
            </li>
            <li class="active">
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
        <h2>Pesanan Customer</h2>
        <table class="table table-hover table-responsive-lg">
          <thead class="table-primary">
            <tr class="text-center">
              <th>No.</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon</th>
              <th>Catatan</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            
            <?php $no = 1; ?>
            <?php foreach($product as $row) : ?>
            <tr class="text-center">
              <td><?= $no ?></td>
              <td><?= $row["nama"] ?></td>
              <td><?= $row["alamat"] ?></td>
              <td><?= $row["telepon"] ?></td>
              <td><?= $row["note"] ?></td>
              <!-- <td>
                <span><a href="editproduk.php?id=<?= $row["id"]; ?>" class="btn btn-primary" role="button">Edit</a></span>
                <span><a href="hapus.php?id=<?= $row["id"]; ?>" class="btn btn-outline-primary" onclick="return confirm('Hapus Data?');">Hapus</a></span>
              </td> -->
            </tr>
          </tbody>
          
          <?php $no++; ?>
          <?php endforeach; ?>
        </table>
      </div>

    <!-- pagination -->
  <!-- </div>
  <div class="row" data-aos="fade-up">
    <div class="col-md-12 text-center pb-5">
      <div class="site-block-27">
        <ul>
          <li class="pr-4"><a href="#">&lt;</a></li>
          <li class="active"><span>1</span></li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">4</a></li>
          <li><a href="#">5</a></li>
          <li class="pl-4"><a href="#">&gt;</a></li>
        </ul>
      </div>
    </div>
  </div>
</div> -->
<!-- 
    <div class="site-section site-blocks-2 border-top">
      <div class="container">
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0" data-aos="fade" data-aos-delay="">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/categories-food.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Categories</span>
                <h3>Foods</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="100">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/categories-drink.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Categories</span>
                <h3>Drinks</h3>
              </div>
            </a>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
            <a class="block-2-item" href="#">
              <figure class="image">
                <img src="images/categories-snack.jpg" alt="" class="img-fluid">
              </figure>
              <div class="text">
                <span class="text-uppercase">Categories</span>
                <h3>Snacks</h3>
              </div>
            </a>
          </div>
        </div>
      </div>
    </div> -->
<!-- 
    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/Kopi.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Coffe</a></h3>
                    <p class="mb-0">Find your favorite coffe here!</p>
                    <p class="text-primary font-weight-bold">Rp.15k-30k</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/dessert.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Dessert</a></h3>
                    <p class="mb-0">Find your favorite dessert here!</p>
                    <p class="text-primary font-weight-bold">Rp.15k-30k</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/bentoo.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Rice</a></h3>
                    <p class="mb-0">Find your favorite rice here!</p>
                    <p class="text-primary font-weight-bold">Rp.15k-30k</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/kitkat.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Snacks</a></h3>
                    <p class="mb-0">Find your favorite snacks here!</p>
                    <p class="text-primary font-weight-bold">Rp.1k-20k</p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="images/sprite.jpg" alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">Drinks</a></h3>
                    <p class="mb-0">Findyour favorite driks here1</p>
                    <p class="text-primary font-weight-bold">Rp.5k-15k</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div> -->

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
  </div>

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