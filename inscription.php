<?php
    session_start();
    include('ressources/php/bdd.php');
    include('classes/Utilisateur.php');
    include('classes/Erreur.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Créer un compte</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ressources/css/style.css">
    <link rel="stylesheet" href="ressources/css/form.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

  </head>

  <body class="page_index">
    <?php include 'views/header.php'; ?>

    <div class="erreur hidden">
    </div>
    <main>
      <form class="form_connexion" action="inscription.php" method="post">
        <h1> Créer un compte </h1>
        <div class="label_input">
          <label for="pseudo">Pseudo </label>
          <input type="text" name="pseudo" id="pseudo">
        </div>

        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="text" name="email" id="email">
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password">
        </div>

        <div class="label_input">
          <label for="confirm_password"> Confirmer le mot de passe</label>
          <input type="password" id="confirm_password" name="confirm_password">
        </div>

        <button type="submit" class="button_pages" name="submit"> Valider </button>
        <p>Déjà membre ? <a href="connexion.php"> Se connecter. </a></p>

      </form>
    </main>
    <?php include 'views/footer.php'; ?>
  </body>
  <script src="ressources/js/inscription.js" type="text/javascript"></script>
</html>
