<?php
include '../application/bdd_connection.php';

$query =

'
SELECT

  COUNT(id) as nbbiere,
  SUM(ventes) as vente,
  SUM(qte) as stock
FROM
  Produit

';

$resultSet = $pdo->prepare($query);
$resultSet->execute();
$posts = $resultSet->fetch();




$query =
'
SELECT
  COUNT(id) as nbuser
FROM
  Client
';
$resultSet = $pdo->prepare($query);
$resultSet->execute();
$clients = $resultSet->fetch();




$query =

'
SELECT

  SUM(prix * ventes) as tot
FROM
  Produit
';

$resultSet = $pdo->prepare($query);
$resultSet->execute();
$sold = $resultSet->fetch();


$query =

'
SELECT
  COUNT(id) as nbcmd

FROM
  Commande

';

$resultSet = $pdo->prepare($query);
$resultSet->execute();
$cmd = $resultSet->fetch();


$query =
'
SELECT
  titre
FROM
  Categorie
';

$resultSet = $pdo->prepare($query);
$resultSet->execute();
$couleurs = $resultSet->fetchAll();




 ?>

{
"NombreBiere": "<?= $posts['nbbiere']; ?>",
"NombreClient": "<?= $clients['nbuser']; ?>",
"VentesFaites": "<?= $posts['vente']; ?>",
"StockTotal": "<?= $posts['stock']; ?>",
"GainsFait": "<?= $sold['tot']; ?>",
"NombreCommande": "<?= $cmd['nbcmd']; ?>"
}
