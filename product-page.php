<?php
session_start();
include 'application/bdd_connection.php';
include 'panier.php';
include 'application/user-log.php';

// include 'nav.phtml';

$id = $_GET['id'];

$query=
'
SELECT
    titre,id_categorie,image,description,prix,id,qte
FROM
    Produit
WHERE
    id=?
';

$resultSet = $pdo->prepare($query);
$resultSet->execute([$id]);
$produit = $resultSet->fetch();



if(isset($_POST['add'])){
    $id=$_GET['id'];
    $qte=$_POST['qte'];
    $prix=$produit['prix'];
    ajouterArticle($id,$qte,$prix);


}



if(isset($_POST['deco'])){

  session_destroy();

  header('Location: index.php');

}



$query =
'
SELECT
titre, description, image, prix, qte, resume
FROM
Produit

WHERE
Produit.id = ?
';

$resultSet = $pdo->prepare($query);
$resultSet->execute([$_GET['id']]);
$post = $resultSet->fetch();


$query =
'
SELECT
url, id_produit, titre
FROM
Images, Produit
WHERE
id_produit = Produit.id AND Produit.id = ?
';

$resultSet = $pdo->prepare($query);
$resultSet->execute([$_GET['id']]);
$slidebiere = $resultSet->fetchAll();


$query =
'
SELECT
id, titre, description, image, prix, qte
FROM
Produit
';

$resultSet = $pdo->query($query);
$posts = $resultSet->fetchAll();


$query =
'
SELECT
id,
titre,
image
FROM
Categorie
';


$resultSet = $pdo->query($query);
$images = $resultSet->fetchAll();

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
titre,
id
FROM
Categorie
';

$resultSet = $pdo->query($query);
$catbiere = $resultSet->fetchAll();

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


$query =
'
SELECT
id,
url

FROM
Images
';

$resultSet = $pdo->query($query);
$urls = $resultSet->fetchAll();

// if(isset($_POST['Oncart'])){
//   if(!isset($_SESSION['clientid'])){
//
//     header('Location: login-user.php');
//   }
//   else{
//
//     $resultSet = $pdo->prepare('SELECT titre, prix FROM Produit WHERE id = ?');
//     $resultSet->execute([$_GET['id']]);
//     $Produit = $resultSet->fetch();
//
//
//     ajouterArticle($Produit['titre'],1, $Produit['prix']);
//
//
//
//     header('Location: index.php');
//
//   }
// }


?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title>Vente de bière</title>

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
                      <!-- <ul class="breadcrumb">
                      <li><a href="#">Home</a></li>
                      <li><a href="#">Products</a></li>
                      <li><a href="#">Category</a></li>
                      <li class="active">Product Name Goes Here</li> -->
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
                      <!--  Product Details -->
                      <div class="product product-details clearfix">
                        <div class="col-md-6">
                          <div id="product-main-view">


                            <div class="product-view">
                              <img src="<?= $post['image'] ?>" alt="" width="100px";>
                            </div>

                            <?php foreach ($slidebiere as $imgbiere): ?>
                              <div class="product-view">
                                <img src="<?= $imgbiere['url'] ?>" alt="" width="100px";>
                              </div>
                            <?php endforeach ?>
                          </div>
                          <div id="product-view">


                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="product-body">
                            <div class="product-label">
                              <span>Promo</span>
                              <span class="sale">-20%</span>
                            </div>
                            <h2 class="product-name"><?= $post['titre'] ?></h2>
                            <h3 class="product-price"><?= $post['prix'] ?>€ l'unité<del class="product-old-price"><?= $post['prix']* 1.2?>€</del></h3>
                            <div>
                              <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o empty"></i>
                              </div>
                              <a href="#">3 Review(s) / Add Review</a>
                            </div>
                            <strong>Disponibilité:</strong>
                            <?php if($produit['qte'] >= 1){
                              echo "<p>En stock</p>";
                            }
                            else {
                              echo"En rupture";
                            } ?>
                            <p><?= $post['description'] ?></p>
                            <p><?= $post['resume'] ?></p>
                            <!-- <div class="product-options">
                            <ul class="size-option">
                            <li><span class="text-uppercase">Size:</span></li>
                            <li class="active"><a href="#">S</a></li>
                            <li><a href="#">XL</a></li>
                            <li><a href="#">SL</a></li>
                          </ul>
                          <ul class="color-option">
                          <li><span class="text-uppercase">Color:</span></li>
                          <li class="active"><a href="#" style="background-color:#475984;"></a></li>
                          <li><a href="#" style="background-color:#8A2454;"></a></li>
                          <li><a href="#" style="background-color:#BF6989;"></a></li>
                          <li><a href="#" style="background-color:#9A54D8;"></a></li>
                        </ul>
                      </div> -->

                      <div class="product-btns">

                        <form method="POST">
            <?php if($produit['qte'] >= 1): ?>
              <span>Quantité:</span>
              <div class="input-group col-md-6 d-flex mb-3">


                <input style="width:100px;" type="number" id="quantity" name="qte" class="quantity form-control input-number" value="1" min="1" max="100">
              </div>
              <br>
              <p>
              <button type="submit" name="add" class="btn btn-black py-3 px-5 mr-2">Ajouter au panier</button>
              </p>


          <?php endif ?>
            </form>
                        <div class="pull-right">
                          <button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
                          <button class="main-btn icon-btn"><i class="fa fa-exchange"></i></button>
                          <button class="main-btn icon-btn"><i class="fa fa-share-alt"></i></button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="product-tab">
                      <ul class="tab-nav">
                        <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                        <li><a data-toggle="tab" href="#tab2">Details</a></li>
                        <li><a data-toggle="tab" href="#tab3">Reviews (3)</a></li>
                      </ul>
                      <div class="tab-content">
                        <div id="tab1" class="tab-pane fade in active">
                          <p><?= $post['resume'] ?></p>
                        </div>
                        <div id="tab2" class="tab-pane fade in">

                          <div class="row">
                            <div class="col-md-6">
                              <div class="product-reviews">
                                <div class="single-review">
                                  <div class="review-heading">
                                    <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                    <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                    <div class="review-rating pull-right">
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star"></i>
                                      <i class="fa fa-star-o empty"></i>
                                    </div>
                                  </div>
                                  <div class="review-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                      irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                    </div>
                                  </div>

                                  <div class="single-review">
                                    <div class="review-heading">
                                      <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                      <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                      <div class="review-rating pull-right">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o empty"></i>
                                      </div>
                                    </div>
                                    <div class="review-body">
                                      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                        irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                      </div>
                                    </div>

                                    <div class="single-review">
                                      <div class="review-heading">
                                        <div><a href="#"><i class="fa fa-user-o"></i> John</a></div>
                                        <div><a href="#"><i class="fa fa-clock-o"></i> 27 DEC 2017 / 8:0 PM</a></div>
                                        <div class="review-rating pull-right">
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star"></i>
                                          <i class="fa fa-star-o empty"></i>
                                        </div>
                                      </div>
                                      <div class="review-body">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.Duis aute
                                          irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                                        </div>
                                      </div>

                                      <ul class="reviews-pages">
                                        <li class="active">1</li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#"><i class="fa fa-caret-right"></i></a></li>
                                      </ul>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <h4 class="text-uppercase">Write Your Review</h4>
                                    <p>Your email address will not be published.</p>
                                    <form class="review-form">
                                      <div class="form-group">
                                        <input class="input" type="text" placeholder="Your Name" />
                                      </div>
                                      <div class="form-group">
                                        <input class="input" type="email" placeholder="Email Address" />
                                      </div>
                                      <div class="form-group">
                                        <textarea class="input" placeholder="Your review"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <div class="input-rating">
                                          <strong class="text-uppercase">Your Rating: </strong>
                                          <div class="stars">
                                            <input type="radio" id="star5" name="rating" value="5" /><label for="star5"></label>
                                            <input type="radio" id="star4" name="rating" value="4" /><label for="star4"></label>
                                            <input type="radio" id="star3" name="rating" value="3" /><label for="star3"></label>
                                            <input type="radio" id="star2" name="rating" value="2" /><label for="star2"></label>
                                            <input type="radio" id="star1" name="rating" value="1" /><label for="star1"></label>
                                          </div>
                                        </div>
                                      </div>
                                      <button class="primary-btn">Submit</button>
                                    </form>
                                  </div>
                                </div>



                              </div>
                            </div>
                          </div>
                        </div>

                      </div>
                      <!-- /Product Details -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /container -->
                </div>
                <!-- /section -->

                <!-- section -->
                <div class="section">
                  <!-- container -->
                  <div class="container">
                    <!-- row -->
                    <!-- <div class="row"> -->
                    <!-- section title -->
                    <!-- <div class="col-md-12">
                    <div class="section-title">
                    <h2 class="title">Picked For You</h2>
                  </div>
                </div> -->
                <!-- section title -->

                <!-- Product Single -->
                <!-- <div class="col-md-3 col-sm-6 col-xs-6">
                <div class="product product-single">
                <div class="product-thumb">
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

    <!-- Product Single -->
    <!-- <div class="col-md-3 col-sm-6 col-xs-6">
    <div class="product product-single">
    <div class="product-thumb">
    <div class="product-label">
    <span>New</span>
  </div>
  <button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
  <img src="./img/product03.jpg" alt="">
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
<!-- <div class="col-md-3 col-sm-6 col-xs-6">
<div class="product product-single">
<div class="product-thumb">
<div class="product-label">
<span class="sale">-20%</span>
</div>
<button class="main-btn quick-view"><i class="fa fa-search-plus"></i> Quick view</button>
<img src="./img/product02.jpg" alt="">
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
<!-- <div class="col-md-3 col-sm-6 col-xs-6">
<div class="product product-single">
<div class="product-thumb">
<div class="product-label">
<span>New</span>
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
<!-- </div> -->
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
            <a class="logo" href="index.php">
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
