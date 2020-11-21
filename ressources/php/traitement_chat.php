<?php
    session_start();
    include('bdd.php');
    include('../../classes/Utilisateur.php');
    include('../../classes/Erreur.php');

    if(isset($_POST['message']) && !empty($_POST['message'])){
        $utilisateur = unserialize($_SESSION["utilisateur"]);
        $id = $utilisateur->getId();

        if(!isset($_GET['id_salon_current']) || empty($_GET['id_salon_current'])){
            $salon_id = 3;
        } else if(isset($_GET['id_salon_current'])){
            // recup en get le num du salon
            $salon_id = $_GET['id_salon_current'];
        }

        $msg = $_POST['message'];
        $date = Date('Y-m-d H:i:s');

        $create_msg = $bdd->prepare("INSERT INTO messages(message, date, id_creator, id_salon) VALUES (?, ?, ?, ?)");
        $create_msg->execute([$msg, $date, $id, $salon_id]);

        echo 'success';
    }
    else{
        echo 'coucou';
    }
?>