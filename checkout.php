<?php
session_start();
include 'application/bdd_connection.php';
include 'application/user-log.php';
include 'panier.php';
$TVA = MontantGlobal()*0.2;
$TTC = MontantGlobal() + $TVA ;

if(!isset($_SESSION['clientid'])){
  header ('Location: index.php');
}

if(isset($_SESSION['clientid'])){

  $query =
  '
  SELECT
    *
  FROM
    Client
  WHERE
    id=?
  ';
  $resultSet = $pdo->prepare($query);
  $resultSet->execute([$_SESSION['clientid']]);
  $info = $resultSet->fetch();


  if(isset($_POST['pay'])){
    supprimePanier();
    creationPanier();
  }
}


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






?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

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
				<li class="active">Checkout</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">
			<!-- row -->
			<h3>Récapitulatif adresses livraison / facturation</h3>
			<div class="row">
					<div class="hpanel">
							<div class="panel-body">
									<form id="checkout-form" class="clearfix" method="post">
											<div class="row">
													<div class="form-group col-lg-6">
															<label>Adresse mail</label>
															<input class="form-control" placeholder="Votre email" name="email" value="<?= $info['email'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Votre numéro de téléphone</label>
															<input class="form-control" placeholder="Renseignez un numéro" name="tel" value="<?= $info['tel'] ?>">
													</div>

													<div class="form-group col-lg-6">
															<label>Votre adresse de livraison</label>
															<input class="form-control" placeholder="Adressse de livraison" name="adresse_livraison" value="<?= $info['adresse_livraison'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Complément adresse de livraison</label>
															<input class="form-control" placeholder="Complément adressse de livraison" name="plus_livraison" value="<?= $info['plus_livraison'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Ville de livraison</label>
															<input class="form-control" placeholder="Ville de livraison" name="ville_livraison" value="<?= $info['ville_livraison'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Code postal de livraison</label>
															<input class="form-control" placeholder="Code postal de livraison" name="cp_livraison" value="<?= $info['cp_livraison'] ?>">
													</div>

													<div class="form-group col-lg-6">
															<label>Votre adresse de facturation</label>
															<input class="form-control" placeholder="Adressse de facturation" name="adresse_facturation" value="<?= $info['adresse_facturation'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Complément adresse de facturation</label>
															<input class="form-control" placeholder="Complément adressse de facturation" name="plus_facturation" value="<?= $info['plus_facturation'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Ville de facturation</label>
															<input class="form-control" placeholder="Ville de facturation" name="ville_facturation" value="<?= $info['ville_facturation'] ?>">
													</div>
													<div class="form-group col-lg-6">
															<label>Code postal de facturation</label>
															<input class="form-control" placeholder="Code postal de facturation" name="cp_facturation" value="<?= $info['cp_facturation'] ?>">
													</div>

											</div>
											<div class="text-center">
													<button class="btn btn-success loginbtn" value="enter" name="enter">Valider</button>
													<button formaction="user-caddie.php" class="btn btn-default">Annuler</button>
											</div>

							</div>
            </form>
					</div>

          <div class="row">
<form method="post">



            <div class="col-md-6">
              <div class="shiping-methods">
                <div class="section-title">
                  <h4 class="title">Modes de livraison</h4>
                </div>
                <div class="input-checkbox">
                  <input type="radio" name="shipping" id="shipping-1" checked>
                  <label for="shipping-1">Livraison gratuite -  0.00€</label>
                  <div class="caption">
                    <p>Nan, on déconne. Vous croyez vraiment qu'on va vous envoyer des trucs gratos !??
                      <p>
                      </div>
                    </div>

                    <div class="input-checkbox">
                      <input type="radio" name="shipping" id="shipping-2" checked>
                      <label for="shipping-2">Livraison standard - 4.00€</label>
                      <div class="caption">
                        <p>Il s'appelle "standard" surtout parce que c'est la seule méthode que nous ayons.
                          <p>
                          </div>
                        </div>

                      </div>

                      <div class="payments-methods">
                        <div class="section-title">
                          <h4 class="title">Moyens de payement</h4>
                        </div>
                        <div class="input-checkbox">
                          <input type="radio" name="payments" id="payments-1" checked>
                          <label for="payments-1">Par carte de crédit</label>
                          <div class="caption">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                              <p>
                              </div>
                            </div>
                            <div class="input-checkbox">
                              <input type="radio" name="payments" id="payments-2">
                              <label for="payments-2">Par chèque</label>
                              <div class="caption">
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                  <p>
                                  </div>
                                </div>
                                <div class="input-checkbox">
                                  <input type="radio" name="payments" id="payments-3">
                                  <label for="payments-3">Par Paypal</label>
                                  <div class="caption">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                      <p>
                                      </div>
                                    </div>
                                  </div>
                                </div>

                                <div class="col-md-12">
                                  <div class="order-summary clearfix">
                                    <div class="section-title">
                                      <h3 class="title">Récapitulatif de votre commande</h3>
                                    </div>
                                    <table class="shopping-cart-table table">
                                      <thead>
                                        <tr>
                                          <th>Produit</th>

                                          <th></th>

                                          <th class="text-center">Prix</th>
                                          <th class="text-center">Quantité commandée</th>
                                          <th class="text-center">Total</th>
                                          <th class="text-right"></th>
                                        </tr>
                                      </thead>
                                      <tbody>



                                        <?php
                                        for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
                                        {

                                          $query=
                                          '
                                          SELECT
                                          titre,image
                                          FROM
                                          Produit
                                          WHERE
                                          id=?
                                          ';

                                          $resultSet = $pdo->prepare($query);
                                          $resultSet->execute([$_SESSION['panier']['libelleProduit'][$i]]);
                                          $produit = $resultSet->fetch();

                                          ?>



                                        <form>
                                          <tr class="text-center">

                                            <td class="image-prod"><img src="<?php echo $produit['image']?>" style="height:100px;"></td>

                                            <td class="product-name">
                                              <h3><?php echo $produit['titre']?></h3>
                                            </td>

                                            <td class="price"><?php echo $_SESSION['panier']['prixProduit'][$i];?>€</td>

                                            <td class="quantity">
                                              <?php echo $_SESSION['panier']['qteProduit'][$i];?>
                                            </td>
                                            <td class="total"><?php echo $_SESSION['panier']['prixProduit'][$i]*$_SESSION['panier']['qteProduit'][$i];?>€</td>
                                            <td class="product-remove"><a href="user-caddie.php?del=<?= $_SESSION['panier']['libelleProduit'][$i] ?>"><span class="ion-ios-close">Enlever</span></a></td>
                                          </tr><!-- END TR-->
                                        <?php } ?>
                                        <tr>
                                          <td class="empty" colspan="3"></td>
                                          <td>TVA </td>
                                          <td colspan="2"><?= $TVA  ?>€</td>
                                        </tr>
                                        <tr>
                                          <td class="empty" colspan="3"></td>
                                          <td>Montant HT</td>
                                          <td colspan="2" class="sub-total"><span><?= MontantGlobal()?> €</span></td>
                                        </tr>
                                        <tr>
                                          <td class="empty" colspan="3"></td>
                                          <td>TOTAL </td>
                                          <td colspan="2" class="total" name="TTC"><?= $TTC ?>€</td>
                                        </tr>
                                      </tfoot>
                                    </table>
                                    <div class="pull-right">
                                      <button formaction="checkout.php" class="primary-btn" name="pay">Payer</button>
                                    </div>
                                  </div>

                                </div>
                              </form>
                            </div>
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
