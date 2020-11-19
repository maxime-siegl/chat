<?php
    // recup tableau salon
    $requete = $bdd->prepare("SELECT * FROM salons");
    $requete->execute();
    $all_salon = $requete->fetchAll(PDO::FETCH_ASSOC);

    echo '<ul class="salon">';
    foreach($all_salon as $salon){
        echo '<li id="'.$salon['id'].'">' .$salon['name_salon']. '</li>';
        // echo '<ul class="chan">
        //             <li id="channel_salon'.$salon['id'].'">
        //                 <img id="create_channel" src="https://img.icons8.com/nolan/20/plus.png"/>
        //             </li>
        //             <li id="new_chan_salon'.$salon['id'].'">
        //                 <img id="moins_channel" src="https://img.icons8.com/nolan/20/minus.png"/>
        //                 <form>
        //                     <input type="text" id="input_channel" placeholder="Nom du Channel...">
        //                     <button type="submit"><img src="https://img.icons8.com/nolan/25/checked-checkbox.png"/></button>
        //                 </form>
        //             </li>';
        // // recup des channels reliés au salon
        // $id_salon = $salon['id'];
        // $query = $bdd->prepare("SELECT * FROM channels WHERE salon_parent = '$id_salon' ");
        // $query->execute();
        // $salon_channels = $query->fetchAll(PDO::FETCH_ASSOC);

        // foreach($salon_channels as $channel){
        //     echo '<li id="'.$channel['id'].'">' .$channel['name_channel']. '</li>';
        // }
        // echo '</ul>';
    }
    echo '</ul>';
?>