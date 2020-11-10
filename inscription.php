<?php include('includes/bdd.php');
include('classes/Utilisateur.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ressources/css/style.css">
    <link rel="stylesheet" href="ressources/css/form.css">
  </head>

  <body>
    <?php include 'views/header.php'; ?>

    <?php

    if(isset($_POST['email'])){
      $utilisateur = new Utilisateur($bdd);
      $password = $utilisateur->crypterPassword($_POST['password']);

      $utilisateur->creerCompte(
        $_POST['email'],
        $_POST['pseudo'],
        $password
      );
    }

    ?>
    <main>
      <form class="form_connexion" action="inscription.php" method="post">
        <h1> Créer un compte </h1>
        <div class="label_input">
          <label for="pseudo">Pseudo </label>
          <input type="text" name="pseudo" id="pseudo"  required>
        </div>

        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="email" name="email" id="email"  required>
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password"  required>
        </div>

        <div class="label_input">
          <label for="password"> Confirmer le mot de passe</label>
          <input type="password" id="password" name="confirm_password" required>
        </div>

        <button type="submit" class="button_pages"> Valider </button>
        <p>Déjà membre ? <a href="connexion.php"> Se connecter. </a></p>

      </form>
    </main>
    <?php include 'views/footer.php'; ?>
  </body>
</html>
