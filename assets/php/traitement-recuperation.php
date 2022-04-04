<?php
require("db.php");
if(isset($_POST)){
    if(isset($_POST["Pseudo"]) && !empty($_POST["Pseudo"])){
        $name = $_POST["Pseudo"];
        if(isset($_POST["mail"]) && !empty($_POST["mail"])){
            $mail = $_POST["mail"];

            $sqlRequest = "SELECT * FROM users WHERE mail_users=:mail_users";
            $pdoStat = $db -> prepare($sqlRequest);
            $pdoStat->execute(ARRAY(
                ':mail_users' => $mail
            ));
            $result = $pdoStat->fetch();

            var_dump($result);























        }
        else{ header("Location: ../../pageinscription.php?erreur=4");
            }
    }
    else{ header("Location: ../../pageinscription.php?erreur=4");
        }
}