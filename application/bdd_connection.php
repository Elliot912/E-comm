<?php
$pdo = new PDO
(
    'mysql:host=;dbname=tata;charset=UTF8',
    'root',
    'amelie',
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
      PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]
  );


  function getNomContinent($id){
    $pdo = new PDO
    (
        'mysql:host=;dbname=tata;charset=UTF8',
        'root',
        'amelie',
        [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
      );
    $query =
    '
    SELECT
    id,
      nom_cont
    FROM
      Continent
      WHERE
      id= ?
    ';

    $resultSet = $pdo->prepare($query);
    $resultSet->execute([$id]);
    $conts = $resultSet->fetch();
    return $conts['nom_cont'];
  };

  ?>
