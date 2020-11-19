<?php
include("bdd.php");
include('../../classes/Utilisateur.php');
session_start();
$utilisateur = unserialize($_SESSION["utilisateur"]);

if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
  $utilisateur->modifierPseudo($_POST['pseudo'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

if(isset($_POST['avatar']) && !empty($_POST['avatar'])){
  // On ne garde du chemin généré par POST que le nom du fichier
  // Exemple : "C:\fakepath\mountain.jpeg" devient "mountain.jpeg"
  $avatar = explode("\\", $_POST['avatar']);

  $uploaddir = 'img/';
  $uploadfile = $uploaddir . $avatar[2];
  echo $avatar[2] ."<br>";
  echo $uploadfile ."<br>";
  if(move_uploaded_file($_POST["avatar"], $uploadfile)){
    echo "success";
  }else{
    echo "fail";
  }

  $utilisateur->modifierImage($avatar[2], $bdd);
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
