<?php
    session_start();
    include('bdd.php');
    include('../../classes/Utilisateur.php');
    include('../../classes/Erreur.php');

    if(!isset($_POST['id_salon_current']) || empty($_POST['id_salon_current'])){
        $salon_id = 3;
    } else if(isset($_POST['id_salon_current'])){
        // recup en get le num du salon
        $salon_id = $_POST['id_salon_current'];
    }

    if(isset($salon_id) && !empty($salon_id)){
        // recup les messages du channel
        $query = $bdd->prepare("SELECT *, messages.id as message_id FROM messages INNER JOIN utilisateurs on messages.id_creator = utilisateurs.id WHERE id_salon = ? ");
        $query->execute([$salon_id]);
        $all_messages = $query->fetchAll();

        $tab_resultat_message = [];
        array_push($tab_resultat_message, $all_messages);

        echo json_encode($tab_resultat_message);

    }else{
        echo 'Failed';
    }
?>