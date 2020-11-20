<?php
include("bdd.php");
include('../../classes/Utilisateur.php');
include('../../classes/Erreur.php');
session_start();
$utilisateur = unserialize($_SESSION["utilisateur"]);

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
  if(strlen($_POST['pseudo']) >= 3){
    $utilisateur->modifierPseudo($_POST['pseudo'], $bdd);
    $_SESSION["utilisateur"] = serialize($utilisateur);
  }else{
    $short = "short_pseudo";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($short);
  }
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
  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
    $utilisateur->modifierEmail($_POST['email'], $bdd);
    $_SESSION["utilisateur"] = serialize($utilisateur);
  }else{
    $format = "format_email";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($format);
  }
}

if(isset($_POST['confirm_password']) && !empty($_POST['confirm_password'])){
  if(($_POST['password'] != $_POST['confirm_password']) AND strlen($_POST['password']) >= 8){
    $utilisateur->modifierPassword($_POST['confirm_password'], $bdd);
    $_SESSION["utilisateur"] = serialize($utilisateur);
  }else{
    echo "Votre mot de passe est trop court, ou bien la confirmation du mot de passe est incorrecte.";
  }
}

?>
