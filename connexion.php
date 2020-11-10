<!DOCTYPE html>
<html>
  <head>
    <title>Se connecter</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ressources/css/style.css">
    <link rel="stylesheet" href="ressources/css/form.css">
  </head>

  <body>

    <form class="form_connexion" action="connexion.php" method="post">
      <div class="label_input">
        <label for="email">Adresse e-mail </label>
        <input type="email" name="email" id="email" required>
      </div>

      <div class="label_input">
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="button_pages"> Connexion </button>

    </form>

  </body>
</html>
