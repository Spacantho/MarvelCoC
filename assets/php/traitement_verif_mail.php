<?php

    require_once("db.php");

    if ((isset($_GET["token"])) && (!empty($_GET["token"]))) {
        $token = $_GET["token"];
    } else {
        header("Location:../../pageconnexion.php?log_error=token_missed");
    }

    $query = "SELECT id_users, token, verified FROM `users` WHERE token = :token";
        $stmt = $db->prepare($query);
        $stmt->execute(array(
            "token"=>$token
        ));
        $data = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (isset($_GET["token"]) && $_GET["token"] == $data['token']) {
        $update ="UPDATE users SET verified = 1 WHERE id_users = ".$data["id_users"];
        $updateDb = $db->prepare($update);
        $updateDb->execute();
        header("Location:../../pageconnexion.php");
    } else {
        header("Location:../../pageconnexion.php?log_error=token_failed");
    }
      
?>