<?php
try
{
  $bdd = new PDO('mysql:host=localhost; port=3306; dbname=chat', 'root', '');

  $bdd->exec("SET CHARACTER SET utf8");

}
catch(Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}


?>
