<?php
    if(!isset($_GET['id_salon_current']) || empty($_GET['id_salon_current'])){
        $salon_id = 3;
    } else if(isset($_GET['id_salon_current'])){
        // recup en get le num du salon
        $salon_id = $_GET['id_salon_current'];
    }

    // recup les messages du channel
    $query = $bdd->prepare("SELECT * FROM messages INNER JOIN utilisateurs on messages.id_creator = utilisateurs.id WHERE id_salon = ? ");
    $query->execute([$salon_id]);
    $all_messages = $query->fetchAll(PDO::FETCH_ASSOC);

    foreach($all_messages as $message){
        echo '<div id="one_message" class="msg_complet">';

        $date_conforme = date('d/m H:i', strtotime($message['date']));

        echo '<p class="entete_msg">'. $message['pseudo'].'&nbsp;'. $date_conforme .'</p>';
        echo '<p class="corps_msg">'. $message['message'] .'</p>';
        echo '</div>';
    }
?>