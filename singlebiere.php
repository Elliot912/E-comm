<?php

 include 'application/bdd_connection.php';
 // include 'nav.phtml';

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

 ?>

 <h2 class="deteails-biere-title">Plus d'infos sur la <?= $post['titre'] ?></h2>

 <section class="details-biere">
   <div class="image-biere">
     <img class="show-bier-img" src="<?= $post['image'] ?>" style="height:100px;">
   </div>
   <br>
   <article class="article-details">La <?= $post['titre'] ?>
<p>Cette bière est une <?= $post['description'] ?>. Nous la vendons au prix de <? $post['prix'] ?>€ l'unité.</p>
<p>Nous en avons actuellement <?= $post['qte'] ?> en stock, alors dépêchez vous avant qu'elles ne disparaissent !</p>
    <br>
    <p>Un petit peu d'histoire pour finir: </p>
    <br>
    <br>
    <p><?= $post['resume'] ?></p>
  </article>
<br>
  <article class="bindex">
  <a href="index.php"><button class="a" type="submit" name="Add">Retour à l'accueil</button></a>
  </article>
</section>
