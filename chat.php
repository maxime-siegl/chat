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
                    <div id="salon_plus">
                        <div id="titre_salon">
                        <?php if($admin == 1){ ?>
                            <h3 id="h3_salon">
                                <img id="create_salon" src="https://img.icons8.com/nolan/25/plus.png"/> &#160; Salon
                            </h3>
                            <img id="moins_salon" src="https://img.icons8.com/nolan/25/minus.png"/>
                            <form method="POST" id="form_new">
                                <input type="text" name="new_salon" id="new_salon" placeholder="Nom du Salon..." >
                                <button type="submit" id="submit_salon"><img src="https://img.icons8.com/nolan/25/checked-checkbox.png"/></button>
                            </form>
                        </div>
                        <?php }else{ ?>
                        <h3>Salons</h3>
                        <?php } ?>
                        <?php include 'ressources/php/affichage_salon.php'; ?>


                </section>
                <section id="messageries">
                    <article id="affichage_msg">
                        <?php include 'ressources/php/affichage_messages.php' ?>
                    </article>
                    <div id="form_new_msg">
                        <form method="POST">
                            <input type="text" name="new_message" id="new_message" placeholder="Ecrivez ici...">
                            <button type="submit" id="submit_new_message">Envoyer</button>
                        </form>
                    </div>
                    <p class="erreur"></p>
                </section>
                <section id="membres">
                    <ul id="personnes">
                        <li><h3> Membres du Salon </h3></li>
                        <?php include 'ressources/php/affichage_users.php' ?>
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
