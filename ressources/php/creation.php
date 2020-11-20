<?php
    session_start();
    include('../../ressources/php/bdd.php');
    include('../../classes/Utilisateur.php');
    include('../../classes/Erreur.php');

    $tab_salon = [];
    $tab_channel = [];

    if(isset($_POST['new_salon']) && !empty($_POST['new_salon'])){
        $new_salon = $_POST['new_salon'];

        $utilisateur = unserialize($_SESSION["utilisateur"]);
        $pseudo = $utilisateur->getPseudo();
        $id = $utilisateur->getId();

        $req = $bdd->prepare("INSERT INTO salons(name_salon, admin_salon) VALUES (?, ?) ");
        $req->execute([$new_salon, $id]);

        $query = $bdd->prepare("SELECT COUNT(*) FROM salons");
        $query->execute();
        $resultat = $query->fetch();

        array_push($tab_salon, $resultat);
        array_push($tab_salon, $new_salon);
        array_push($tab_salon, 'Success');

        echo json_encode($tab_salon);
    }
    else
    {
        echo 'erreur';
    }

    // if(isset($_POST['new_channel']) && !empty($_POST['new_channel'])){
    //     $new_channel = $_POST['new_channel'];

    //     $utilisateur = unserialize($_SESSION["utilisateur"]);
    //     $pseudo = $utilisateur->getPseudo();
    //     $id = $utilisateur->getId();

    //     $req = $bdd->prepare("INSERT INTO channels(name_channel, admin_channel) VALUES (?, ?) ");
    //     $req->execte([$new_channel, $id]);

    //     $query = $bdd->prepare("SELECT COUNT(*) FROM channels");
    //     $query->execute();
    //     $resultat = $query->fetch();

    //     $id_new_channel = $resultat + 1;

    //     array_push($tab_channel, $id_new_channel);
    //     array_push($tab_channel, 'Success');

    //     echo json_encode($tab_channel);
    // }else{
    //     echo 'erreur';
    // }
?>