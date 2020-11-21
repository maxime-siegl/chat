<?php
    if(!isset($_GET['id_salon_current']) || empty($_GET['id_salon_current'])){
        $salon_id = 3;
    } else if(isset($_GET['id_salon_current'])){
        // recup en get le num du salon
        $salon_id = $_GET['id_salon_current'];
    }

    $req = $bdd->prepare("SELECT * FROM salons WHERE id = ?");
    $req->execute([$salon_id]);
    $result = $req->fetch(PDO::FETCH_ASSOC);

    echo '"'.$result['name_salon'].'"';
?>