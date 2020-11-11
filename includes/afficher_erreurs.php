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

}elseif(empty($_POST['password'])){
  $empty = "empty_password";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}elseif(empty($_POST['confirm_password'])){
  $empty = "empty_confirm";
  $erreur = new Erreur($bdd);
  $erreur->afficherErreur($empty);

}
 ?>
