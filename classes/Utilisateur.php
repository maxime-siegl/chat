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

  public function getEmail() {
    return $this->_email;
  }

  public function getPseudo() {
    return $this->_pseudo;
  }

  public function getId() {
    return $this->_id;
  }

  public function getImage() {
    return $this->_image;
  }

  public function getPassword() {
    return $this->_Password;
  }

  public function getAdmin() {
    return $this->_admin;
  }

  public function setEmail($val) {
    $this->_email = $val;
  }

  public function setPseudo($val) {
    $this->_pseudo = $val;
  }


  public function setImage($val) {
    $this->_image = $val;
  }

  public function setPassword($val) {
    $this->_Password = $val;
  }

  public function setAdmin($val) {
    $this->_admin = $val;
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

  public function modifierInfos(){
    // Sera utilisée sur la page profil.php
  }

  public function hydrater(array $donnees)
    {
      $this->_id = $donnees['id'];
      $this->_email = $donnees['email'];
      $this->_pseudo = $donnees['pseudo'];
      $this->_password = $donnees['password'];
      $this->_image = $donnees['image'];
      $this->_admin = $donnees['admin'];
  }

}

 ?>
