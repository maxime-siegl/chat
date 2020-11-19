<?php
include("bdd.php");
include('../../classes/Utilisateur.php');
session_start();
$utilisateur = unserialize($_SESSION["utilisateur"]);



if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
  $utilisateur->modifierPseudo($_POST['pseudo'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

if(isset($_FILES['avatar']) && !empty($_FILES['avatar'])){

  $dir = '../../img/';
  $sourcePath = $_FILES['avatar']['tmp_name'];
  $targetPath = $dir . $_FILES['avatar']['name'];

  move_uploaded_file($sourcePath,$targetPath);

  $utilisateur->modifierImage($_FILES["avatar"]["name"], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

if(isset($_POST['email']) && !empty($_POST['email'])){
  $utilisateur->modifierEmail($_POST['email'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

if(isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
  $utilisateur->modifierPassword($_POST['confirm_password'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

?>
