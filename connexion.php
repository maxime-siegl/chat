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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>
  </head>

  <body class="page_index">
    <?php include 'views/header.php'; ?>

    <div class="erreur hidden">
    </div>
    <main>
      <form class="form_connexion" method="post" id="connexion">
        <h1> Se connecter </h1>
        <div class="label_input">
          <label for="email">Adresse e-mail </label>
          <input type="text" name="email" id="email">
        </div>

        <div class="label_input">
          <label for="password">Mot de passe</label>
          <input type="password" id="password" name="password" autocomplete>
        </div>

        <button type="submit" class="button_pages"v name="submit"> Valider </button>
        <p>Je suis nouveau. <a href="inscription.php"> Créer un compte. </a></p>
      </form>
    </main>

    <?php include 'views/footer.php'; ?>
  </body>
  <script src="ressources/js/formulaires.js" type="text/javascript"></script>
</html>
