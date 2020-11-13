<?php
    if(isset($_POST['new_message'])){
        $id = $_SESSION['id'];
        $msg = $_POST['new_message'];

        $create_msg = $bdd->prepare("INSERT INTO messages VALUES (?, ?)");
        $create_msg->execute([$msg, $id]);
    }
?>