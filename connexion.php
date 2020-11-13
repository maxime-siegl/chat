<?php
    session_start();
    include('ressources/php/bdd.php');
    include('classes/Utilisateur.php');
    include('classes/Erreur.php');
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

  <body class="page_index">
    <?php include 'views/header.php'; ?>

    <?php if(isset($_POST['submit'])){ ?>
    <div class="erreur">
      <?php include('ressources/php/afficher_erreurs_connexion.php'); ?>
    </div>
  <?php } ?>
    <main>
      <form class="form_connexion" action="connexion.php" method="post">
        <h1> Se connecter </h1>
        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="text" name="email" id="email">
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password">
        </div>

        <button type="submit" class="button_pages"v name="submit"> Valider </button>
        <p>Je suis nouveau. <a href="inscription.php"> Créer un compte. </a></p>
      </form>
    </main>

    <?php include 'views/footer.php'; ?>
  </body>
</html>
