<?php include('includes/bdd.php');
include('classes/Utilisateur.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="ressources/css/style.css">
    <link rel="stylesheet" href="ressources/css/form.css">
  </head>

  <body>
    <?php include 'views/header.php'; ?>

    <?php
    if(isset($_POST['email'])){
      $utilisateur = new Utilisateur($bdd);
      $utilisateur->seConnecter($_POST['email'], $_POST['password']);
    }
     ?>
    <main>
      <form class="form_connexion" action="connexion.php" method="post">
        <h1> Se connecter </h1>
        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="email" name="email" id="email" required>
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="button_pages"> Valider </button>
        <p>Je suis nouveau. <a href="inscription.php"> Créer un compte. </a></p>
      </form>
    </main>

    <?php include 'views/footer.php'; ?>
  </body>
</html>
