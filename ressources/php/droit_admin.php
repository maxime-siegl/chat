<?php
    session_start();
    include('bdd.php');
    include('../../classes/Utilisateur.php');
    include('../../classes/Erreur.php');

    $tab_result = [];

    if(isset($_POST['droit_modif']) && !empty($_POST['droit_modif'])){
        $admin_num = $_POST['droit_modif'];

        $requete = $bdd->prepare("SELECT administrateur_discord FROM utilisateurs WHERE id = ?");
        $requete->execute([$admin_num]);
        $result = $requete->fetch();

        if($result['administrateur_discord'] == 1){
            $droit = 0;
        } else{
            $droit = 1;
        }

        $req = $bdd->prepare("UPDATE utilisateurs SET administrateur_discord = ? WHERE id = ?");
        $req->execute([$droit, $admin_num]);

        $success = array_push($tab_result, 'modification_ok');

    } else if(isset($_POST['droit_supp']) && !empty($_POST['droit_supp'])){
        $admin_num = $_POST['droit_supp'];

        $requete = $bdd->prepare("SELECT administrateur_discord FROM utilisateurs WHERE id = ?");
        $requete->execute([$admin_num]);
        $result = $requete->fetch();

        if($result == '1'){
            $droit = 0;
        } else{
            $droit = 1;
        }

        $req = $bdd->prepare("DELETE FROM utilisateurs WHERE id = ?");
        $req->execute([$admin_num]);

        $success = array_push($tab_result, 'suppression_ok');
    }else{
        $failled = array_push($tab_result, 'erreur survenue');
    }

    echo json_encode($tab_result);
?>