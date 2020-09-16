<div id="navigation">
  <!-- container -->
  <div class="container">
    <div id="responsive-nav">
      <!-- category nav -->
      <div class="category-nav">
        <span class="category-header">Sommaire <i class="fa fa-list"></i></span>
        <ul class="category-list">
          <li class="dropdown side-dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Bières <i class="fa fa-angle-right"></i></a>
            <div class="custom-menu">
              <div class="row">
                <div class="col-md-4">
                  <ul class="list-links">
                    <li>
                      <h3 class="list-links-title">Bières blondes</h3></li>
                      <?php foreach ($biereblonde as $blonde): ?>
                    <a href="product-page.php?id=<?= $blonde['id'] ?>"><li> <?= $blonde['titre'] ?></li></a>
                  <?php endforeach ?>

                  <hr class="hidden-md hidden-lg">
                </div>
                <div class="col-md-4">
                  <ul class="list-links">
                    <li>
                      <h3 class="list-links-title">Bière brune</h3></li>
                      <?php foreach ($bierebrune as $brune): ?>
                      <a href="product-page.php?id=<?= $brune['id'] ?>"><li> <?= $brune['titre'] ?></li></a>
                  <?php endforeach ?>
                  </ul>
                  <hr class="hidden-md hidden-lg">
                </div>
                <div class="col-md-4">
                  <ul class="list-links">
                    <li>
                      <h3 class="list-links-title">Bière ambrée</h3></li>
                      <?php foreach ($biereambree as $ambree): ?>
                      <a href="product-page.php?id=<?= $ambree['id'] ?>"><li> <?= $ambree['titre'] ?></a></li>
                  <?php endforeach ?>

                  </ul>
                </div>
              </div>
              <div class="row hidden-sm hidden-xs">
                <div class="col-md-12">
                  <hr>
                  <a class="banner banner-1" href="#">
                    <img src="./img/beer.gif" style="height:300px;" style="width:200px;" alt="">
                  </a>
                </div>
              </div>
            </div>
          </li>

          <li class="dropdown side-dropdown"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Les villes <i class="fa fa-angle-right"></i></a>
            <div class="custom-menu">
              <div class="row">
                <div class="col-md-4">
                  <ul class="list-links">
                    <li>
                      <h3 class="list-links-title">Villes d'Europe</h3></li>
                      <?php foreach ($villeseuro as $ville): ?>
                  <a href="ville-page.php?id=<?= $ville['id'] ?>"><li> <?= $ville['nom'] ?></li></a>
                  <?php endforeach ?>

                  </ul>
                  <hr>
                  <ul class="list-links">
                    <li>
                      <h3 class="list-links-title">Villes d'Afrique</h3></li>
                      <?php foreach ($villesafro as $ville): ?>
                  <a href="ville-page.php?id=<?= $ville['id'] ?>"><li> <?= $ville['nom'] ?></li></a>
                  <?php endforeach ?>
                  </ul>
                    <hr>
                  <ul class="list-links">
                    <li>
                      <h3 class="list-links-title">Villes des Amériques</h3></li>
                      <?php foreach ($villesamé as $ville): ?>
                  <a href="ville-page.php?id=<?= $ville['id'] ?>"><li> <?= $ville['nom'] ?></li></a>
                  <?php endforeach ?>
                </ul>
                  <hr>
                <ul class="list-links">
                  <li>
                    <h3 class="list-links-title">Villes d'Asie
                    </h3></li>
                    <?php foreach ($villesasie as $ville): ?>
                  <a href="ville-page.php?id=<?= $ville['id'] ?>"><li> <?= $ville['nom'] ?></li></a>
                <?php endforeach ?>
                </ul>
                  <hr>

                  <hr class="hidden-md hidden-lg">
                </div>

                <div class="col-md-4 hidden-sm hidden-xs">
                  <a class="banner banner-2" href="#">
                    <img src="./img/earth.gif" alt="">
                    <div class="banner-caption">

                    </div>
                  </a>
                </div>
              </div>
            </div>
          </li>

          <li class="dropdown side-dropdown">

            <div class="custom-menu">
              <div class="row">
                <div class="col-md-4">

                  <hr>

                  <hr class="hidden-md hidden-lg">
                </div>
                <div class="col-md-4">

                </div>
                <div class="col-md-4">

                </div>
              </div>
            </div>
          </li>

        </ul>
      </div>
      <!-- /category nav -->

      <!-- menu nav -->
      <div class="menu-nav">
        <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
        <ul class="menu-list">
          <li><a href="index.php">Accueil</a></li>
            </ul>
          </li>
        </ul>
      </div>
      <!-- menu nav -->
    </div>
  </div>
  <!-- /container -->
</div>
