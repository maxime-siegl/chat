<?php
    $req = $bdd->prepare("SELECT * FROM utilisateurs");
    $req->execute();
    $result = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($result as $user){
        echo '<li>'. $user['pseudo'] .'</li>';
    }
?>