<?php
if(empty($_POST['email']))
{
  $empty = "empty_email";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);
}elseif(empty($_POST['pseudo']))
{
  $empty = "empty_pseudo";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif(empty($_POST['password']))
{
  $empty = "empty_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif(empty($_POST['confirm_password']))
{
  $empty = "empty_confirm";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif($_POST['password'] != $_POST['confirm_password'])
{
  $error = "error_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($error);

}elseif(strlen($_POST['password']) < 8)
{
  $short = "short_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);
  
}elseif(strlen($_POST['pseudo']) < 8)
{
  $short = "short_pseudo";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($short);
}
 ?>
