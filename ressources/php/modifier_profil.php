<?php
include("bdd.php");
include('../../classes/Utilisateur.php');
session_start();
$utilisateur = unserialize($_SESSION["utilisateur"]);

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
  $utilisateur->modifierPseudo($_POST['pseudo'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

var_dump($_POST['avatar']);

if(isset($_POST['avatar']) && !empty($_POST['avatar'])){
  var_dump($_POST['avatar']);
  // On ne garde du chemin généré par POST que le nom du fichier

  $uploaddir = 'img/';
  $uploadfile = $uploaddir . basename($_POST['avatar']);

  if(move_uploaded_file($_POST["avatar"], $uploadfile)){
    echo "success";
  }else{
    echo "fail";
  }

  $utilisateur->modifierImage($_POST['avatar'], $bdd);
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
