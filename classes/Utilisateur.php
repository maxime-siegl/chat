<?php

class Utilisateur{

  private $_id;
  private $_email;
  private $_pseudo;
  private $_image; // Sera ajoutée à partir de la page Profil.php
  private $_password;
  private $_admin; // Booléen

  public function crypterPassword($_password){
    $password = password_hash($_password, PASSWORD_BCRYPT);
    return $this->_password = $password;
  }

  public function creerCompte($_email, $_pseudo, $_password, $bdd){
    // Récupère les infos entrées dans le formulaire
    // Et les insère dans la bdd pour créer un utilisateur

    $inscription = $bdd->prepare("INSERT INTO utilisateurs(email, pseudo, password) VALUES (?, ?, ?)");
    $inscription->execute([$_email, $_pseudo, $_password]);

  }

  public function seConnecter($email, $password, $bdd){

    $connexion = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = '$email' ");
    $connexion->execute();
    $resultat = $connexion->fetch();
    if(password_verify($password, $resultat['password'])){
      $this->hydrater($resultat);
      return true;
    } else {
      return false;
    }
  }

  public function seDeconnecter(){

  }

  public function modifierInfos(){
    // Sera utilisée sur la page profil.php
  }

  public function hydrater(array $donnees)
    {
      $this->_id = $donnees['id'];
      $this->_email = $donnees['email'];
      $this->_pseudo = $donnees['pseudo'];
      $this->_password = $donnees['password'];
      $this->_admin = $donnees['admin'];
  }

}

 ?>
