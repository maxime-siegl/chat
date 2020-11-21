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
        echo '<td>'.$admin.'</td>';
        echo '<td class="modif_supp">';
        echo '<a id="modif" href="profil.php?id_droit='.$user['id'].'"><img src="https://img.icons8.com/nolan/35/toggle-on.png"/></a>';
        echo '<a id="supp" href="profil.php?id_supp='.$user['id'].'"><img src="https://img.icons8.com/nolan/35/remove-user-male.png"/></a>';
        echo '</td>';
        echo '</tr>';
    }
?>