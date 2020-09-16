
<?php
session_start();
 include 'application/bdd_connection.php';
// include 'nav.phtml';
if(!isset($_SESSION['clientid'])){
  header('Location: index.php');
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
  $resultSet->execute([$_GET['id']]);
  $info = $resultSet->fetch();




if(isset($_POST['enter'])){
var_dump($_POST);

  $query =
  '
  UPDATE
  Client
  SET
  nom=?, prenom=?, user=?, password=?, email=?, adresse_livraison=?, plus_livraison=?, ville_livraison=?, cp_livraison=?, adresse_facturation=?, plus_facturation=?, ville_facturation=?, cp_facturation=?, tel=?
  WHERE
    id=?
  ';

  $resultSet = $pdo->prepare($query);
  $resultSet->execute([$_POST['nom'], $_POST['prenom'], $_POST['user'], $_POST['password'], $_POST['email'], $_POST['adresse_livraison'], $_POST['plus_livraison'], $_POST['ville_livraison'], $_POST['cp_livraison'], $_POST['adresse_facturation'],
  $_POST['plus_facturation'], $_POST['ville_facturation'], $_POST['cp_facturation'], $_POST['tel'], $_GET['id']]);


  header('Location: index.php');
}

}





?>




<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Vente de bière</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/owl.theme.css">
    <link rel="stylesheet" href="css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <div class="color-line"></div>







    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
            <div class="col-md-6 col-md-6 col-sm-6 col-xs-12">
                <div class="text-center custom-login">
                    <h3>Modification de vos données personnelles</h3>
                </div>
                <div class="hpanel">
                    <div class="panel-body">
                        <form id="loginForm" method="post">
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label>Nom utilisateur</label>
                                    <input class="form-control" placeholder="Votre nom d'utilisateur" name="user" value="<?= $info['user'] ?>">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Nom</label>
                                    <input required class="form-control" placeholder="Votre nom "name="nom" value="<?= $info['nom'] ?>">
                                </div>

                                <div class="form-group col-lg-12">
                                    <label>Prénom</label>
                                    <input required class="form-control" placeholder="Votre prénom" name="prenom" value="<?= $info['prenom'] ?>">
                                </div>

                                <div class="form-group col-lg-6">
                                    <label>Mot de passe</label>
                                    <input required type="password" class="form-control" placeholder="Votre mot de passe" name="password" value="<?= $info['password'] ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirmer le mot de passe</label>
                                    <input required type="password" class="form-control" placeholder="Répétez votre mot de passe" name="password" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Adresse mail</label>
                                    <input required class="form-control" placeholder="Votre email" name="email" value="<?= $info['email'] ?>">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Confirmer l'adresse mail</label>
                                    <input required class="form-control" placeholder="Répétez votre email" name="email" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Votre numéro de téléphone</label>
                                    <input required class="form-control" placeholder="Renseignez un numéro" name="tel" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Votre adresse de livraison</label>
                                    <input required class="form-control" placeholder="Adressse de livraison" name="adresse_livraison" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Complément adresse de livraison</label>
                                    <input required class="form-control" placeholder="Complément adressse de livraison" name="plus_livraison" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Ville de livraison</label>
                                    <input required class="form-control" placeholder="Ville de livraison" name="ville_livraison" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Code postal de livraison</label>
                                    <input required class="form-control" placeholder="Code postal de livraison" name="cp_livraison" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Votre adresse de facturation</label>
                                    <input required class="form-control" placeholder="Adressse de facturation" name="adresse_facturation" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Complément adresse de facturation</label>
                                    <input required class="form-control" placeholder="Complément adressse de facturation" name="plus_facturation" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Ville de facturation</label>
                                    <input required class="form-control" placeholder="Ville de facturation" name="ville_facturation" value="">
                                </div>
                                <div class="form-group col-lg-6">
                                    <label>Code postal de facturation</label>
                                    <input required class="form-control" placeholder="Code postal de facturation" name="cp_facturation" value="">
                                </div>
                                <div class="checkbox col-lg-12">
                                    <input type="checkbox" class="i-checks" checked> Sigh up for our newsletter
                                </div>
                            </div>
                            <div class="text-center">
                                <button class="btn btn-success loginbtn" value="enter" name="enter">Register</button>
                                <a href="index.php"  class="btn btn-default">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12"></div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <p>Copyright &copy; 2018 <a href="https://colorlib.com/wp/templates/">Colorlib</a> All rights reserved.</p>
            </div>
        </div>
    </div>

    <!-- jquery
		============================================ -->
    <script src="js/vendor/jquery-1.11.3.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="js/metisMenu/metisMenu.min.js"></script>
    <script src="js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="js/icheck/icheck.min.js"></script>
    <script src="js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="js/main.js"></script>
</body>

</html>
