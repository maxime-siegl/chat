<?php
    $req = $bdd->prepare("SELECT id, pseudo FROM utilisateurs");
    $req->execute();
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($results as $pseudo){
        echo
            '<div class="input_checkbox">
                <input type="checkbox" name="'.$pseudo['pseudo'].'" id="'.$pseudo['id'].'">
                <label for="'.$pseudo['id'].'">'. $pseudo['pseudo'] .'</label>
            </div>';
    }
?>