<?php
session_start();
 include 'application/bdd_connection.php';
 include 'panier.php';
 include 'application/user-log.php';
 // include 'nav.phtml';
 if(isset($_POST['deco'])){

   session_destroy();

   header('Location: index.php');

 }




 $query =
 '
SELECT
  titre,  image
FROM
  Categorie

WHERE
  Categorie.id = ?
 ';

 $resultSet = $pdo->prepare($query);
 $resultSet->execute([$_GET['id']]);
 $post = $resultSet->fetch();


$query =
'
SELECT id, titre, image, id_categorie, prix FROM Produit WHERE id_categorie = ?
';

$resultSet = $pdo->prepare($query);
$resultSet->execute([$_GET['id']]);
$posts = $resultSet->fetchAll();


$query =
'
SELECT
  titre, id
FROM
  Produit
WHERE
  id_categorie = 2
';

$resultSet = $pdo->query($query);
$biereblonde = $resultSet->fetchAll();

$query =
'
SELECT
  titre, id
FROM
  Produit
WHERE
  id_categorie = 1
';

$resultSet = $pdo->query($query);
$bierebrune = $resultSet->fetchAll();


$query =
'
SELECT
  titre, id
FROM
  Produit
WHERE
  id_categorie = 3
';

$resultSet = $pdo->query($query);
$biereambree = $resultSet->fetchAll();

$query =
'
SELECT
  id,
  nom,
  pays,
  id_continent
FROM
  Ville
WHERE
  id_continent = 1
';

$resultSet = $pdo->query($query);
$villeseuro = $resultSet->fetchAll();


$query =
'
SELECT
  id,
  nom,
  pays,
  id_continent
FROM
  Ville
WHERE
  id_continent = 2
';

$resultSet = $pdo->query($query);
$villesafro = $resultSet->fetchAll();

$query =
'
SELECT
  id,
  nom,
  pays,
  id_continent
FROM
  Ville
WHERE
  id_continent = 3
';

$resultSet = $pdo->query($query);
$villesamé = $resultSet->fetchAll();

$query =
'
SELECT
  id,
  nom,
  pays,

  id_continent
FROM
  Ville
WHERE
  id_continent = 4
';

$resultSet = $pdo->query($query);
$villesasie = $resultSet->fetchAll();


 ?>






  <!DOCTYPE html>
 <html lang="en">

 <head>
 	<meta charset="utf-8">
 	<meta http-equiv="X-UA-Compatible" content="IE=edge">
 	<meta name="viewport" content="width=device-width, initial-scale=1">
 	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

 	<title>Vente de biere</title>

 	<!-- Google font -->
 	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

 	<!-- Bootstrap -->
 	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

 	<!-- Slick -->
 	<link type="text/css" rel="stylesheet" href="css/slick.css" />
 	<link type="text/css" rel="stylesheet" href="css/slick-theme.css" />

 	<!-- nouislider -->
 	<link type="text/css" rel="stylesheet" href="css/nouislider.min.css" />

 	<!-- Font Awesome Icon -->
 	<link rel="stylesheet" href="css/font-awesome.min.css">

 	<!-- Custom stlylesheet -->
 	<link type="text/css" rel="stylesheet" href="css/style.css" />

 	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
 	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
 	<!--[if lt IE 9]>
 		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
 		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
 		<![endif]-->

 </head>

 <body>
 	<!-- HEADER -->
  <?php include 'header.php'; ?>
 	<!-- /HEADER -->

 	<!-- NAVIGATION -->
 	<?php include 'nav.php'; ?>
 	<!-- /NAVIGATION -->

 	<!-- BREADCRUMB -->
 	<div id="breadcrumb">
 		<div class="container">
 			<ul class="breadcrumb">
 				<li><a href="#">Home</a></li>
 				<li class="active">Products</li>
 			</ul>
 		</div>
 	</div>
 	<!-- /BREADCRUMB -->

 	<!-- section -->
 	<div class="section">
 		<!-- container -->
 		<div class="container">
 			<!-- row -->
 			<div class="row">
 				<!-- ASIDE -->
 				<div id="aside" class="col-md-3">
 					<!-- aside widget -->
 					<div class="aside">

 					</div>
 					<!-- /aside widget -->

 					<!-- aside widget -->
 					<div class="aside">
 					</div>
 					<!-- aside widget -->

 					<!-- aside widget -->
 					<div class="aside">

 					</div>
 					<!-- /aside widget -->

 					<!-- aside widget -->
 					<div class="aside">

 					</div>
 					<!-- /aside widget -->

 					<!-- aside widget -->
 					<div class="aside">
 					</div>
 					<!-- /aside widget -->

 					<!-- aside widget -->
 					<div class="aside">
 					</div>
 					<!-- /aside widget -->

 					<!-- aside widget -->
 					<div class="aside">
 						<!-- widget product -->
 						<!-- <div class="product product-widget">
 							<div class="product-thumb">
 								<img src="./img/thumb-product01.jpg" alt="">
 							</div>
 							<div class="product-body">
 								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 								<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
 								<div class="product-rating">
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star-o empty"></i>
 								</div>
 							</div>
 						</div> -->
 						<!-- /widget product -->

 						<!-- widget product -->
 						<!-- <div class="product product-widget">
 							<div class="product-thumb">
 								<img src="./img/thumb-product01.jpg" alt="">
 							</div>
 							<div class="product-body">
 								<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 								<h3 class="product-price">$32.50</h3>
 								<div class="product-rating">
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star"></i>
 									<i class="fa fa-star-o empty"></i>
 								</div>
 							</div>
 						</div> -->
 						<!-- /widget product -->
 					</div>
 					<!-- /aside widget -->
 				</div>
 				<!-- /ASIDE -->

 				<!-- MAIN -->
 				<div id="main" class="col-md-9">
 					<!-- store top filter -->
 					<!-- <div class="store-filter clearfix">
 						<div class="pull-left">
 							<div class="row-filter">
 								<a href="#"><i class="fa fa-th-large"></i></a>
 								<a href="#" class="active"><i class="fa fa-bars"></i></a>
 							</div>
 							<div class="sort-filter">
 								<span class="text-uppercase">Sort By:</span>
 								<select class="input">
 										<option value="0">Position</option>
 										<option value="0">Price</option>
 										<option value="0">Rating</option>
 									</select>
 								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
 							</div>
 						</div>
 						<div class="pull-right">
 							<div class="page-filter">
 								<span class="text-uppercase">Show:</span>
 								<select class="input">
 										<option value="0">10</option>
 										<option value="1">20</option>
 										<option value="2">30</option>
 									</select>
 							</div>
 							<ul class="store-pages">
 								<li><span class="text-uppercase">Page:</span></li>
 								<li class="active">1</li>
 								<li><a href="#">2</a></li>
 								<li><a href="#">3</a></li>
 								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
 							</ul>
 						</div>
 					</div> -->
 					<!-- /store top filter -->

 					<!-- STORE -->
          <h2>Nos <?= str_replace("Bière", "Bières", $post['titre']) ?>s</h2>
 					<div id="store">
 						<!-- row -->
 						<div class="row">
 							<!-- Product Single -->
 							<div class="col-md-4 col-sm-6 col-xs-6">


 										<img src="<?= $post['image'] ?>" alt="">

                    <div class="product product-single">
                  <?php foreach ($posts as $post): ?>
                    <h2 class="product-name"><a href="#"><?= $post['titre'] ?></a></h2>
                    <div class="product-thumb">
   										<div class="product-label">
   											<span>Promo</span>
   											<span class="sale">-20%</span>
   										</div>
   										<a href="product-page.php?id=<?= $post['id'] ?>"><button class="main-btn quick-view"><i class="fa fa-search-plus"></i>Vers la bière</button>
   										<img src="<?= $post['image'] ?>" alt="" width="200px";></a>
   									</div>
 									<div class="product-body">
 										<h3 class="product-price"><?= $post['prix'] ?>€ l'unité </h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
                  <br>
                  <br>
                  <br>
 									</div>
                <?php endforeach ?>
 								</div>
 							</div>
 							<!-- /Product Single -->

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product02.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50</h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<div class="clearfix visible-sm visible-xs"></div>

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<div class="product-label">
 											<span>New</span>
 											<span class="sale">-20%</span>
 										</div>
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product03.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<div class="clearfix visible-md visible-lg"></div>

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<div class="product-label">
 											<span>New</span>
 										</div>
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product04.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50</h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<div class="clearfix visible-sm visible-xs"></div>

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<div class="product-label">
 											<span>New</span>
 										</div>
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product05.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50</h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<div class="product-label">
 											<span>New</span>
 											<span class="sale">-20%</span>
 										</div>
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product06.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<div class="clearfix visible-md visible-lg visible-sm visible-xs"></div>

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<div class="product-label">
 											<span>New</span>
 											<span class="sale">-20%</span>
 										</div>
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product07.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product08.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50</h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->

 							<div class="clearfix visible-sm visible-xs"></div>

 							<!-- Product Single -->
 							<!-- <div class="col-md-4 col-sm-6 col-xs-6">
 								<div class="product product-single">
 									<div class="product-thumb">
 										<div class="product-label">
 											<span class="sale">-20%</span>
 										</div>
 										<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
 										<img src="./img/product01.jpg" alt="">
 									</div>
 									<div class="product-body">
 										<h3 class="product-price">$32.50 <del class="product-old-price">$45.00</del></h3>
 										<div class="product-rating">
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star"></i>
 											<i class="fa fa-star-o empty"></i>
 										</div>
 										<h2 class="product-name"><a href="#">Product Name Goes Here</a></h2>
 										<div class="product-btns">
 											<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
 											<button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
 											<button class="primary-btn add-to-cart"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
 										</div>
 									</div>
 								</div>
 							</div> -->
 							<!-- /Product Single -->
 						</div>
 						<!-- /row -->
 					</div>
 					<!-- /STORE -->

 					<!-- store bottom filter -->
 					<!-- <div class="store-filter clearfix">
 						<div class="pull-left">
 							<div class="row-filter">
 								<a href="#"><i class="fa fa-th-large"></i></a>
 								<a href="#" class="active"><i class="fa fa-bars"></i></a>
 							</div>
 							<div class="sort-filter">
 								<span class="text-uppercase">Sort By:</span>
 								<select class="input">
 										<option value="0">Position</option>
 										<option value="0">Price</option>
 										<option value="0">Rating</option>
 									</select>
 								<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
 							</div>
 						</div>
 						<div class="pull-right">
 							<div class="page-filter">
 								<span class="text-uppercase">Show:</span>
 								<select class="input">
 										<option value="0">10</option>
 										<option value="1">20</option>
 										<option value="2">30</option>
 									</select>
 							</div>
 							<ul class="store-pages">
 								<li><span class="text-uppercase">Page:</span></li>
 								<li class="active">1</li>
 								<li><a href="#">2</a></li>
 								<li><a href="#">3</a></li>
 								<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
 							</ul>
 						</div>
 					</div> -->
 					<!-- /store bottom filter -->
 				</div>
 				<!-- /MAIN -->
 			</div>
 			<!-- /row -->
 		</div>
 		<!-- /container -->
 	</div>
 	<!-- /section -->

 	<!-- FOOTER -->
 	<footer id="footer" class="section section-grey">
 		<!-- container -->
 		<div class="container">
 			<!-- row -->
 			<div class="row">
 				<!-- footer widget -->
 				<div class="col-md-3 col-sm-6 col-xs-6">
 					<div class="footer">
 						<!-- footer logo -->
 						<div class="footer-logo">
 							<a class="logo" href="#">
 		            <img src="./img/logo.png" alt="">
 		          </a>
 						</div>
 						<!-- /footer logo -->

 						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna</p>

 						<!-- footer social -->
 						<ul class="footer-social">
 							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
 							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
 							<li><a href="#"><i class="fa fa-instagram"></i></a></li>
 							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
 							<li><a href="#"><i class="fa fa-pinterest"></i></a></li>
 						</ul>
 						<!-- /footer social -->
 					</div>
 				</div>
 				<!-- /footer widget -->

 				<!-- footer widget -->
 				<div class="col-md-3 col-sm-6 col-xs-6">
 					<div class="footer">
 						<h3 class="footer-header">My Account</h3>
 						<ul class="list-links">
 							<li><a href="#">My Account</a></li>
 							<li><a href="#">My Wishlist</a></li>
 							<li><a href="#">Compare</a></li>
 							<li><a href="#">Checkout</a></li>
 							<li><a href="#">Login</a></li>
 						</ul>
 					</div>
 				</div>
 				<!-- /footer widget -->

 				<div class="clearfix visible-sm visible-xs"></div>

 				<!-- footer widget -->
 				<div class="col-md-3 col-sm-6 col-xs-6">
 					<div class="footer">
 						<h3 class="footer-header">Customer Service</h3>
 						<ul class="list-links">
 							<li><a href="#">About Us</a></li>
 							<li><a href="#">Shiping & Return</a></li>
 							<li><a href="#">Shiping Guide</a></li>
 							<li><a href="#">FAQ</a></li>
 						</ul>
 					</div>
 				</div>
 				<!-- /footer widget -->

 				<!-- footer subscribe -->
 				<div class="col-md-3 col-sm-6 col-xs-6">
 					<div class="footer">
 						<h3 class="footer-header">Stay Connected</h3>
 						<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
 						<form>
 							<div class="form-group">
 								<input class="input" placeholder="Enter Email Address">
 							</div>
 							<button class="primary-btn">Join Newslatter</button>
 						</form>
 					</div>
 				</div>
 				<!-- /footer subscribe -->
 			</div>
 			<!-- /row -->
 			<hr>
 			<!-- row -->
 			<div class="row">
 				<div class="col-md-8 col-md-offset-2 text-center">
 					<!-- footer copyright -->
 					<div class="footer-copyright">
 						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 						Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
 						<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
 					</div>
 					<!-- /footer copyright -->
 				</div>
 			</div>
 			<!-- /row -->
 		</div>
 		<!-- /container -->
 	</footer>
 	<!-- /FOOTER -->

 	<!-- jQuery Plugins -->
 	<script src="js/jquery.min.js"></script>
 	<script src="js/bootstrap.min.js"></script>
 	<script src="js/slick.min.js"></script>
 	<script src="js/nouislider.min.js"></script>
 	<script src="js/jquery.zoom.min.js"></script>
 	<script src="js/main.js"></script>

 </body>

 </html>
