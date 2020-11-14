<?php session_start(); ?>
<header>
    <a id="titre" href="index.php"><h1>Little Discord</h1></a>
    <?php
        if(!isset($_SESSION) || empty($_SESSION)){
    ?>
    <section id="header_module_co">
        <a href="connexion.php"><img src="https://img.icons8.com/nolan/45/login-rounded-right.png"/></a>
        <a href="inscription.php"><img src="https://img.icons8.com/nolan/45/save-as.png"/></a>
    </section>
    <?php
        }
        else{

          $utilisateur = unserialize($_SESSION["utilisateur"]);
          $admin = $utilisateur->getAdmin();
          $pseudo = $utilisateur->getPseudo();
    ?>
    <section id="header_navigation">
        <a href="chat.php"><img src="https://img.icons8.com/nolan/45/speech-bubble-with-dots.png"/></a>
        <a href="profil.php"><img src="https://img.icons8.com/nolan/45/user.png"/></a>
        <?php
            if($admin == "admin" || $pseudo == "Petit Maitre de la Discorde"){
        ?>
        <a href="admin.php"><img src="https://img.icons8.com/nolan/45/networking-manager.png"/></a>
        <?php
            }
        ?>
        <a href="index.php"><img src="https://img.icons8.com/nolan/64/logout-rounded-left.png"/></a>
    </section>
    <?php } ?>
</header>
