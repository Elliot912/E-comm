<?php
session_start();
 include 'application/bdd_connection.php';
// include 'nav.phtml';

if(isset($_POST['ok'])){
$query =
'
SELECT
  COUNT(user) as nbr,
  COUNT(password) as nbr

FROM
  Admin
WHERE
  user=? AND password=?
';
$resultSet = $pdo->prepare($query);
$resultSet->execute([$_POST['user'], $_POST['password']]);
$admin = $resultSet->fetch();


if($admin['nbr'] > 0){
  $_SESSION['admin'] = 'Bienvenue';
  header('Location: main-admin.php');
}
elseif($admin['nbr'] > 0){
  $_SESSION['admin'] = 'Bienvenue';
  header('Location: administration.php');
}
else{
  echo 'loupé';
}
}


function get_ip()
{
    if (isset ($_SERVER['HTTP_X_FORWARDED_FOR'] ) )
    {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    elseif (isset ( $_SERVER['HTTP_CLIENT_IP'] ) )
    {
        $ip  = $_SERVER['HTTP_CLIENT_IP'];
    }
    else
    {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}
$ip = get_ip();
var_dump($ip);

if(isset($_POST['ok'])){
$query =
'
INSERT INTO
  Connexion
VALUES
  (DEFAULT, ?, NOW(), ?)
';

$resultSet = $pdo->prepare($query);
$resultSet->execute([$ip['ip'],0]);

?>


<form method="POST">
  <input type="text" name="user" placeholder="Entre le login">
  <br>
  <input type="password" name="password" placeholder="Le MDP">
  <br>
  <!-- <input type="text" name="Fonction" placeholder="Votre fonction">
  <br> -->
  <input type="submit" name="ok" value="OK">
</form>
