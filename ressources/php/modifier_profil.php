<?php
$utilisateur = unserialize($_SESSION["utilisateur"]);

if(isset($_POST['pseudo'])){
  $utilisateur->modifierPseudo($_POST['pseudo'], $bdd);
  $_SESSION["utilisateur"] = serialize($utilisateur);
}

?>
