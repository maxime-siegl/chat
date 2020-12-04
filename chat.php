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
                    <div id="mySidebar" class="sidebar">
                        <a href="javascript:void(0)" class="closebtn" id="nav_close">&times;</a>
                        <div id="titre_salon">
                        <?php if($admin == 1){ ?>
                            <h3 id="h3_salon">
                                <img id="create_salon" src="https://img.icons8.com/nolan/25/plus.png"/> &#160; Salon
                            </h3>

                            <form method="POST" id="form_new">
                                <img id="moins_salon" src="https://img.icons8.com/nolan/25/minus.png"/>
                                <input type="text" name="new_salon" id="new_salon" placeholder="Nom du Salon..." >
                                <button type="submit" id="submit_salon"></button>
                            </form>
                        </div>
                        <?php }else{ ?>
                        <h3>Salons</h3>
                        <?php } ?>
                        <?php include 'ressources/php/affichage_salon.php'; ?>
                    </div>
                </section>

                <div id="open_nav">
                    <button id="nav_open" class="openbtn"><img src="https://img.icons8.com/nolan/64/group-task.png"/></button>
                </div>

                <section id="messageries">
                    <p id="titre_salon">
                        Vous êtes sur le salon
                        <span>
                            <?php include 'ressources/php/afficher_current_salon.php'; ?>
                        </span>
                    </p>

                    <article id="article_principal" class="affichage_msg">
                    </article>
                    <div id="form_new_msg">
                        <form method="POST">
                            <textarea name="new_message" id="new_message" cols="30" row="1" placeholder="Ecrivez ici..."></textarea>
                            <img id="submit_new_message" src="https://img.icons8.com/nolan/25/telegram-app.png"/>
                        </form>
                    </div>
                    <p class="erreur"></p>
                </section>

                <div id="mySidebar2" class="sidebar2">
                    <a href="javascript:void(0)" class="closebtn2" id="nav_close2">&times;</a>
                    <section id="membres">
                        <ul id="personnes">
                            <h3> Membres du Salon </h3>
                            <?php include 'ressources/php/affichage_users.php' ?>
                        </ul>
                    </section>

                    <div id="open_nav2">
                        <button id="nav_open2" class="openbtn2"><img src="https://img.icons8.com/nolan/64/user-group-man-woman.png"/></button>
                    </div>
                </div>
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
