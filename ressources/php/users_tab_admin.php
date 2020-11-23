<?php
    $req = $bdd->prepare("SELECT * FROM utilisateurs");
    $req->execute();
    $resultats = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach($resultats as $user){
        // var_dump($user);
        echo '<tr>';
        echo '<td class="user_tab">'.$user['pseudo'].'</td>';

        if($user['administrateur_discord'] == 1){
            $admin = 'Administrateur';
        } else{
            $admin = "Utilisateur";
        }
        echo '<td id="accessibilite">'.$admin.'</td>';
        echo '<td class="modif_supp">';
        echo '<img class="img_modif" id="'.$user['id'].'" src="https://img.icons8.com/nolan/35/toggle-on.png"/>';
        echo '<img class="img_supp" id="'.$user['id'].'" src="https://img.icons8.com/nolan/35/remove-user-male.png"/>';
        echo '</td>';
        echo '</tr>';
    }
?>