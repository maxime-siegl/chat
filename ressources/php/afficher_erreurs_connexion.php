<?php
include("bdd.php");
include('../../classes/Utilisateur.php');
include('../../classes/Erreur.php');
session_start();
$erreur = false;

if(isset($_POST["email"]) && isset($_POST["password"])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
}

if(empty($_POST['email']))
{
  $erreur = true;

  $empty = "empty_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);
}

if(empty($_POST['password']) && !$erreur)
{
  $erreur = true;

  $empty = "empty_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);
}

if(isset($_POST['email']) && !$erreur)
{
  $get_email = $bdd->prepare("SELECT COUNT(*) FROM utilisateurs WHERE email = '$email' ");
  $get_email->execute();
  $resultat = $get_email->fetchColumn();

  if($resultat == 0)
  {
    $erreur = true;

    $unknown = "unknown_email";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($unknown);
  }
}

if(!$erreur) {

  $utilisateur = new Utilisateur();

  if($utilisateur->seConnecter($email, $password, $bdd)) {

    $_SESSION["utilisateur"] = serialize($utilisateur);
    echo "ok";

  } else {

    $wrong = "wrong_password";
    $erreur = new Erreur($bdd);
    $erreur->afficherErreur($wrong);

  }

}
 ?>
