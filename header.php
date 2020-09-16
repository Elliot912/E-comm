<?php
// --------------------------------------------------------------
// FONCTION : FORMATAGE sans accents
// --------------------------------------------------------------
function formatage_sans_accent( $chaine )
{
$chaine = html_entity_decode( $chaine );        // Convertit les entités HTML spéciales en caractères
// -----------------
// remplacement : caractères accentués et espace
$NON_array          = array(
'À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', '&#258;', '&#260;',
'Ç', '&#262;', '&#268;', 'Œ',
'&#270;', '&#272;',
'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', '&#259;', '&#261;',
'ç', '&#263;', '&#269;', 'œ',
'&#271;', '&#273;',
'È', 'É', 'Ê', 'Ë', '&#280;', '&#282;',
'&#286;',
'Ì', 'Í', 'Î', 'Ï', '&#304;',
'&#313;', '&#317;', '&#321;',
'è', 'é', 'ê', 'ë', '&#281;', '&#283;',
'&#287;',
'ì', 'í', 'î', 'ï', '&#305;',
'&#314;', '&#318;', '&#322;',
'Ñ', '&#323;', '&#327;',
'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', '&#336;',
'&#340;', '&#344;',
'&#346;', '&#350;', 'Š',
'ñ', '&#324;', '&#328;',
'ò', 'ó', 'ô', 'ö', 'ø', '&#337;',
'&#341;', '&#345;',
'&#347;', '&#351;', 'š',
'&#354;', '&#356;',
'Ù', 'Ú', 'Û', '&#370;', 'Ü', '&#366;', '&#368;',
'Ý', 'ß',
'&#377;', '&#379;', 'Ž',
'&#355;', '&#357;',
'ù', 'ú', 'û', '&#371;', 'ü', '&#367;', '&#369;',
'ý', 'ÿ',
'&#378;', '&#380;', 'ž',
'&#1040;', '&#1041;', '&#1042;', '&#1043;', '&#1044;', '&#1045;', '&#1025;', '&#1046;', '&#1047;', '&#1048;', '&#1049;', '&#1050;', '&#1051;', '&#1052;', '&#1053;', '&#1054;', '&#1055;', '&#1056;',
'&#1072;', '&#1073;', '&#1074;', '&#1075;', '&#1076;', '&#1077;', '&#1105;', '&#1078;', '&#1079;', '&#1080;', '&#1081;', '&#1082;', '&#1083;', '&#1084;', '&#1085;', '&#1086;', '&#1088;',
'&#1057;', '&#1058;', '&#1059;', '&#1060;', '&#1061;', '&#1062;', '&#1063;', '&#1064;', '&#1065;', '&#1066;', '&#1067;', '&#1068;', '&#1069;', '&#1070;', '&#1071;',
'&#1089;', '&#1090;', '&#1091;', '&#1092;', '&#1093;', '&#1094;', '&#1095;', '&#1096;', '&#1097;', '&#1098;', '&#1099;', '&#1100;', '&#1101;', '&#1102;', '&#1103;'
);

$OUI_array = array(
'A', 'A', 'A', 'A', 'A', 'A', 'AE', 'A', 'A',
'C', 'C', 'C', 'CE',
'D', 'D',
'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'a', 'a',
'c', 'c', 'c', 'ce',
'd', 'd',
'E', 'E', 'E', 'E', 'E', 'E',
'G',
'I', 'I', 'I', 'I', 'I',
'L', 'L', 'L',
'e', 'e', 'e', 'e', 'e', 'e',
'g',
'i', 'i', 'i', 'i', 'i',
'l', 'l', 'l',
'N', 'N', 'N',
'O', 'O', 'O', 'O', 'O', 'O', 'O',
'R', 'R',
'S', 'S', 'S',
'n', 'n', 'n',
'o', 'o', 'o', 'o', 'o', 'o',
'r', 'r',
's', 's', 's',
'T', 'T',
'U', 'U', 'U', 'U', 'U', 'U', 'U',
'Y', 'Y',
'Z', 'Z', 'Z',
't', 't',
'u', 'u', 'u', 'u', 'u', 'u', 'u',
'y', 'y',
'z', 'z', 'z',
'A', 'B', 'B', 'r', 'A', 'E', 'E', 'X', '3', 'N', 'N', 'K', 'N', 'M', 'H', 'O', 'N', 'P',
'a', 'b', 'b', 'r', 'a', 'e', 'e', 'x', '3', 'n', 'n', 'k', 'n', 'm', 'h', 'o', 'p',
'C', 'T', 'Y', 'O', 'X', 'U', 'u', 'W', 'W', 'b', 'b', 'b', 'E', 'O', 'R',
'c', 't', 'y', 'o', 'x', 'u', 'u', 'w', 'w', 'b', 'b', 'b', 'e', 'o', 'r'
);

$chaine = str_replace($NON_array, $OUI_array, $chaine);
// -----------------
return $chaine;
}


function url_rewriting($chaine) {

// Supprime les espaces (ou d'autres caractères) en début et fin de chaîne
$chaine = trim($chaine);

// Remplace des caractères dans une chaîne
$chaine = formatage_sans_accent( $chaine );
// Renvoie une chaîne en minuscules
$chaine = strtolower($chaine);

// les caracètres spéciaux (aures que lettres et chiffres)
$chaine = preg_replace('/([^.a-z0-9]+)/i', '-', $chaine);

$chaine = str_replace('--', '-', $chaine); // enlève les - multiples

$chaine = trim($chaine, '-'); // enlève les - en début et fin de chaine

return $chaine;
}
?>


<header>
  <!-- top Header -->
  <div id="top-header">
    <div class="container">
      <div class="pull-left">
        <span>Bienvenue où l'alcool coule à flot !</span>
      </div>
      <div class="pull-right">
        <ul class="header-top-links">
          <li><a href="#">Achat bières</a></li>
          <!-- <li><a href="#">S'abonner</a></li>
          <li><a href="contact.php">FAQ</a></li>
          <li class="dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
            <ul class="custom-menu">
              <li><a href="#">English (ENG)</a></li>
              <li><a href="#">Russian (Ru)</a></li>
              <li><a href="#">French (FR)</a></li>
              <li><a href="#">Spanish (Es)</a></li>
            </ul>
          </li> -->
          <!-- <li class="dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
            <ul class="custom-menu">
              <li><a href="#">USD ($)</a></li>
              <li><a href="#">EUR (€)</a></li>
            </ul>
          </li> -->
          <li><a href="admin/jeweler-master/login.php">Administer</a></li>
        </ul>
      </div>
    </div>
  </div>
  <!-- /top Header -->

  <!-- header -->
  <div id="header">
    <div class="container">
      <div class="pull-left">
        <!-- Logo -->
        <div class="header-logo">
          <a class="logo" href="index.php">
            <img src="./img/logob.gif" alt=""; >
          </a>
        </div>
        <!-- /Logo -->

        <!-- Search -->
        <div class="header-search">
          <form>
            <input class="input search-input" type="text" placeholder="Enter your keyword">
            <select class="input search-categories">
              <option>Catégorie de bière</option>
<?php foreach ($images as $image): ?>
<option><?= $testitre = $image['titre'] ?></option></a>
<?php endforeach ?>
            </select>

        <button class="search-btn"><i class="fa fa-search"></i></button>

          </form>
        </div>
        <!-- /Search -->
      </div>
      <div class="pull-right">
        <ul class="header-btns">
          <!-- Account -->
          <form method="post">
            <li class="header-account dropdown default-dropdown">
              <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-user-o"></i>
                </div>
                <strong class="text-uppercase">Mon compte <i class="fa fa-caret-down"></i></strong>
              </div>
              <a href="login-user.php" class="text-uppercase">Connection</a> / <a href="register.php" class="text-uppercase">S'inscrire</a>
              <?php if(isLogUser()): ?>
                <ul class="custom-menu">
                <li><a href="info-user.php?id=<?= $_SESSION['clientid'] ?>"><i class="fa fa-user-o"></i> Mes infos personnelles</a></li>
                <li><button value="deco" name="deco"><i class="fa fa-user-plus"></i>Déconnexion</button></li>
              </ul>
            <?php endif ?>
            </li>
          </form>
          <!-- /Account -->

          <!-- Cart -->
          <li class="header-cart dropdown default-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
              <div class="header-btns-icon">
                <i class="fa fa-shopping-cart"></i>
                <span class="qty"><?= compterArticles() ?></span>
              </div>
              <strong class="text-uppercase"><?= MontantGlobal() ?>€</strong>
              <br>

            </a>
            <div class="custom-menu">
              <div id="shopping-cart">

                <div class="shopping-cart-btns">
                  <a href="user-caddie.php"><button class="main-btn">Voir caddie</button><a href="user-caddie.php">
                  <a href="#"><button class="primary-btn">Checkout <i class="fa fa-arrow-circle-right"></i></button></a>
                </div>
              </div>
            </div>
          </li>
          <!-- /Cart -->

          <!-- Mobile nav toggle-->
          <li class="nav-toggle">
            <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
          </li>
          <!-- / Mobile nav toggle -->
        </ul>
      </div>
    </div>
    <!-- header -->
  </div>
  <!-- container -->
</header>
