<?php
$utilisateur = unserialize($_SESSION["utilisateur"]);

if(isset($_POST['pseudo'])){
  $utilisateur->modifierPseudo($_POST['pseudo'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}


if(isset($_FILES['avatar'])){
  $uploaddir = 'img/';
  $uploadfile = $uploaddir . basename($_FILES['avatar']['name']);
  if(move_uploaded_file($_FILES["avatar"]["name"], $uploadfile)){
    echo "success";
  }else{
    echo "fail";
  }

  $utilisateur->modifierImage($_FILES['avatar']['name'], $bdd);
  var_dump($utilisateur);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

if(isset($_POST['email'])){
  $utilisateur->modifierEmail($_POST['email'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

?>
