<?php
    // recup tableau salon
    $requete = $bdd->prepare("SELECT * FROM salons");
    $requete->execute();
    $all_salon = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach($all_salon as $salon){
        echo '<ul class="salon" id="'.$salon['id'].'">';
        echo '<li>' .$salon['name_salon']. '</li>';
        echo '<ul class="chan">';
        // recup des channels reliés au salon
        $id_salon = $salon['id'];
        $query = $bdd->prepare("SELECT * FROM channels WHERE salon_parent = '$id_salon' ");
        $query->execute();
        $salon_channels = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach($salon_channels as $channel){
            echo '<li id="'.$channel['id'].'">' .$channel['name_channel']. '</li>';
        }
        echo '</ul>';
        echo '</ul>';
    }
?>