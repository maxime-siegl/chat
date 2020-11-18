<?php

class Utilisateur{

  private $_id;
  private $_email;
  private $_pseudo;
  private $_image = "basic.png"; // Sera ajoutée à partir de la page Profil.php
  private $_password;
  private $_admin; // Booléen

  public function crypterPassword($_password){
    $password = password_hash($_password, PASSWORD_BCRYPT);
    return $this->_password = $password;
  }
/************* Getters **********/
  public function getId(){
    return $this->_id;
  }

  public function getEmail() {
    return $this->_email;
  }

  public function getPseudo() {
    return $this->_pseudo;
  }

  public function getImage() {
    return $this->_image;
  }

  public function getPassword() {
    return $this->_password;
  }

  public function getAdmin() {
    return $this->_admin;
  }
/********* Setters ************/
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
    $inscription = $bdd->prepare("INSERT INTO utilisateurs(email, pseudo, password, image) VALUES (?, ?, ?, ?)");
    $inscription->execute([$_email, $_pseudo, $_password, $this->_image]);
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

  public function modifierImage($image, $bdd){
    $update_image = $bdd->prepare("UPDATE utilisateurs SET image = ? WHERE id = ?");
    $update_image->execute([$image, $this->_id]);
    $this->_image = $image;
  }

  public function modifierPseudo($new_pseudo, $bdd){
    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE pseudo = ?");
    $query->execute([$new_pseudo]);
    $result = $query->fetch();
    if(empty($result)){
      $update_pseudo = $bdd->prepare("UPDATE utilisateurs SET pseudo = ? WHERE id = ?");
      $update_pseudo->execute([$new_pseudo, $this->_id]);
      $this->_pseudo = $new_pseudo;
      } else {
        echo "Ce pseudo est déjà utilisé.";
      }
  }

  public function modifierPassword($new_password, $bdd){
    $password = $this->crypterPassword($new_password);
    echo $password;
    $update_password = $bdd->prepare("UPDATE utilisateurs SET password = ? WHERE id = ?");
    $update_password->execute([$password, $this->_id]);
  }

  public function modifierEmail($new_email, $bdd){
    $query = $bdd->prepare("SELECT * FROM utilisateurs WHERE email = ?");
    $query->execute([$new_email]);
    $result = $query->fetch();
    if(empty($result)){
      $update_email = $bdd->prepare("UPDATE utilisateurs SET email = ? WHERE id = ?");
      $update_email->execute([$new_email, $this->_id]);
      $this->_email = $new_email;
      } else {
        echo "Cet email est déjà utilisé.";
      }
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
