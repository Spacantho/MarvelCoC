<?php
require("db.php");
$max = 255;

// erreur 1 = champs non remplis
//  erreur 2 = mot de passe trop long

if(isset($_GET['token'])){

    $token = $_GET['token'];

    if(!empty($_POST['New-mdp']) && !empty($_POST['RNew-mdp'])){
        if(strlen($_POST['New-mdp']) && strlen($_POST['RNew-mdp']) <= $max){
            $password = htmlspecialchars(password_hash($_POST["New-mdp"], PASSWORD_DEFAULT));

            
            $sqlRequest = "UPDATE users SET password_users =:password_users
                              WHERE token=:token;";
            $pdoStat = $db -> prepare($sqlRequest);
            $pdoStat->execute(Array(
                ':password_users'   =>    $password,
                ':token'      =>    $token,
            ));

            $token = openssl_random_pseudo_bytes(26);
            $token = bin2hex($token);

            $sqlRequest = "UPDATE users SET token =:token
                              WHERE password_users=:password_users;";
            $pdoStat = $db -> prepare($sqlRequest);
            $pdoStat->execute(Array(
                ':password_users'   =>    $password,
                ':token'      =>    $token,
            ));
            header("location: ../../pageconnexion.php");
        }
        else{ header("location: ../../pagenewmdp.php?token=$token&erreur=2");}
    }
    else{ header("location: ../../pagenewmdp.php?token=$token&erreur=1");}
}
else{ header("location: ../../index.php");}