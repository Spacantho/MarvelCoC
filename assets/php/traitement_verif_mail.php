<?php

    require_once("db.php");

    if ((isset($_GET["token"])) && (!empty($_GET["token"]))) {
        $token = $_GET["token"];

            $stmt = $db->prepare("SELECT id_users, token, verified FROM `users` WHERE token = ?");
            $stmt->execute([$token]);
            $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
        if ($token == $data['token']) {

            $updateDb = $db->prepare("UPDATE users SET verified = 1 WHERE id_users = ?");
            $updateDb->execute([$data["id_users"]]);
            header("Location:../../pageconnexion.php?mes=valid");
        } else {
            header("Location:../../pageconnexion.php?mes=token_failed");
        }
    } else {
        header("Location:../../pageconnexion.php?mes=token_missed");
    }
      
?>