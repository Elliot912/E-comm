<?php
// include 'connexion.php';
      include 'application/bdd_connection.php';


$query =
'
SELECT
  CONCAT(Produit.titre) as bieret,
  description,
  CONCAT(Produit.image) biereimg,
  prix,
  qte,
   `resume`,
   CONCAT(Categorie.titre) couleurt,
   CONCAT(Categorie.image) couleurimg
FROM
    Produit,
    Categorie
WHERE
    Produit.id_categorie = Categorie.id AND Categorie.id = 1
';

$resultSet = $pdo->query($query);
$posts = $resultSet->fetchAll();


$couleur =
'
SELECT
  titre,
  image
FROM
  Categorie
WHERE
  Categorie.id = 1


';
$result = $pdo->prepare($couleur);
$result->execute();
$couleurb = $result->fetch();

?>

<h2 class="blondes-title">Voici la liste des <?= $couleurb['titre'] ?>
</h2>

<img class="blonde-img" src="<?= $couleurb['image'] ?>">


<h4>Pour cette catégorie de bière, nous vous proposons celles-ci
</h4>
<?php foreach ($posts as $post): ?>

<ul class="blonde-list">
    <li>A quoi elle ressemble<?= $post['biereimg'] ?>
      <p>Son nom: La <?= $post['bieret'] ?></p>
      <p>Plus d'info sur cette bière; <?= $post['description'] ?>
      </p>
      <p>Nous en avons actuellement <?= $post['qte'] ?> en stock, et nous vous la proposons à <?= $post['prix'] ?> l'unité</p>
      <p>Et pour finir, si vous voulez en savoir plus sur ce produit voici un résumé complet -> <?= $post['resume'] ?></p>
    </li>
    <hr>
  <?php endforeach ?>
</ul>
