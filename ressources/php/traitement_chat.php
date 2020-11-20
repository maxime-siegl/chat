<?php
    session_start();
    include('bdd.php');
    include('../../classes/Utilisateur.php');
    include('../../classes/Erreur.php');

    if(isset($_POST['message']) && !empty($_POST['message'])){
        $utilisateur = unserialize($_SESSION["utilisateur"]);
        $id = $utilisateur->getId();

        $id_salon_current = $_POST['id_salon_current'];

        $msg = $_POST['message'];
        $date = Date('Y-m-d H:i:s');

        $create_msg = $bdd->prepare("INSERT INTO messages(message, date, id_creator, id_salon) VALUES (?, ?, ?, ?)");
        $create_msg->execute([$msg, $date, $id, $id_salon_current]);

        echo 'success';
    }
    else{
        echo 'coucou';
    }
?>