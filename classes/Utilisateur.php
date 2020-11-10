<?php

class Utilisateur{
  private $_bdd;
  private $_id;
  private $_email;
  private $_pseudo;
  private $_image;
  private $_password;
  private $_admin; // Booléen

  public function __construct($_bdd){
    return $this->_bdd = $_bdd;
  }

  public function crypterPassword($_password){
    $password = password_hash($_password, PASSWORD_BCRYPT);
    return $this->_password = $password;
  }

  public function creerCompte($_email, $_pseudo, $_password){
    // Récupère les infos entrées dans le formulaire
    // Et les insère dans la bdd pour créer un utilisateur

    $inscription = $this->_bdd->prepare("INSERT INTO utilisateurs(email, pseudo, password) VALUES (?, ?, ?)");
    $inscription->execute([$_email, $_pseudo, $_password]);

    if($inscription){
      header("Location:connexion.php");
    }
  }

    public function seConnecter($email, $password){

      $connexion = $this->_bdd->prepare("SELECT * FROM utilisateurs WHERE email = '$email' ");
      $connexion->execute();
      $resultat = $connexion->fetch();

      if($resultat){
        if(password_verify($password, $resultat['password'])){
          header('Location:profil.php');
        }
      }
    }

    public function seDeconnecter(){

    }


  public function modifierInfos(){
    // Sera utilisée sur la page profil.php
  }

  public function hydrater(array $donnees)
    {
      if (isset($donnees['id']))
    {
      $this->setId($donnees['id']);
    }
    if (isset($donnees['pseudo']))
    {
      $this->setNom($donnees['pseudo']);
    }
    if (isset($donnees['email']))
    {
      $this->setPrenom($donnees['email']);
    }
    if (isset($donnees['image']))
    {
      $this->setEmail($donnees['image']);
    }
    if (isset($donnees['password']))
    {
      $this->setPassword($donnees['password']);
    }
    if (isset($donnees['admin']))
    {
      $this->setAdmin($donnees['admin']);
    }
  }

}

 ?>
