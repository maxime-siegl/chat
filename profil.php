 <?php
    session_start();
    include('ressources/php/bdd.php');
    include('classes/Utilisateur.php');
    include('classes/Erreur.php');

    if(!isset($_SESSION['utilisateur'])){
      header("Location:index.php");
    }
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
    <?php
      include 'views/header.php';
      ?>

     <main class="img_main">
       <div class="erreur hidden">
       </div>
        <form class="form_profil" action="profil.php" id="profil" method="post" enctype="multipart/form-data">
          <h1> Mes informations </h1>
          <div class="img_profil">
            <img src="img/<?= $utilisateur->getImage(); ?>" alt="Photo de profil" id="image_avatar">
            <input type="file" id="avatar" name="avatar" accept="image/png, image/jpeg" value="" style='color:lightgrey'>
          </div>
          <div class="label_input_profil">
            <label for="pseudo">Pseudo </label>
            <input type="text" name="pseudo" id="pseudo" placeholder="<?= $utilisateur->getPseudo(); ?>">
          </div>

          <div class="label_input_profil">
            <label for="email">Adresse e-mail </label>
            <input type="text" name="email" id="email" placeholder="<?= $utilisateur->getEmail(); ?>">
          </div>

          <div class="label_input_profil">
            <label for="password">Mot de passe</label>
            <input type="password" autocomplete id="password" name="password">
          </div>

          <div class="label_input_profil">
            <label for="confirm_password"> Confirmer le mot de passe</label>
            <input type="password" autocomplete id="confirm_password" name="confirm_password">
          </div>

          <button type="submit" class="button_pages" name="submit"> Modifier </button>

        </form>

        <?php
          $utilisateur = unserialize($_SESSION["utilisateur"]);
          $admin = $utilisateur->getAdmin();
          $pseudo = $utilisateur->getPseudo();
          $id = $utilisateur->getId();

          if(isset($utilisateur) && !empty($utilisateur)){
        ?>
          <table id="tab_admin">
            <thead>
              <tr>
                <th>Utilisateurs</th>
                <th>Droit</th>
                <th>Modif Droit / Suppression</th>
              </tr>
            </thead>
            <tbody>
              <?php include 'ressources/php/users_tab_admin.php'; ?>
            </tbody>
          </table>
        <?php
          }
        ?>
     </main>

     <?php include('views/footer.php'); ?>
   </body>
   <script src="ressources/js/formulaires.js" charset="utf-8"></script>
   <script src="ressources/js/modif_admin.js"></script>
</html>
