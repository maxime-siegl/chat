<?php
    session_start();
    include('ressources/php/bdd.php');
    include('classes/Utilisateur.php');
    include('classes/Erreur.php');
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="ressources/css/style.css">

        <script src="https://code.jquery.com/jquery-3.5.1.min.js" charset="utf-8"></script>

        <title>Little Discord</title>
    </head>
    <body id="page_chat">
        <?php include 'views/header.php'; ?>

        <?php
            if(isset($_SESSION['pseudo']) || isset($_SESSION['id']) || !empty($_SESSION)){
                $utilisateur = unserialize($_SESSION["utilisateur"]);
                $admin = $utilisateur->getAdmin();
                $pseudo = $utilisateur->getPseudo();
                $id = $utilisateur->getId();

        ?>

        <main id="chat">
            <section id="corps_discord">
                <section id="channels">
                    <h3>Salon</h3>
                        <?php include 'ressources/php/affichage_salon_channel.php'; ?>
                </section>
                <section id="messageries">
                    <article id="affichage_msg">
                        <?php include 'ressources/php/affichage_messages.php' ?>
                    </article>
                    <div id="form_new_msg">
                        <input type="text" name="new_message" id="new_message" placeholder="Ecrivez ici...">
                        <button type="submit" id="create_new_message">Envoyer</button>
                    </div>
                    <p class="erreur"></p>
                </section>
                <section id="membres">
                    <ul id="personnes">
                        <li><h3> Membres du Salon </h3></li>
                    </ul>
                </section>
            </section>
        </main>

        <?php
            }
            else{
                header('location:connexion.php');
            }
        ?>

        <?php include 'views/footer.php'; ?>
    </body>
    <script src="ressources/js/chat.js"></script>
</html>
