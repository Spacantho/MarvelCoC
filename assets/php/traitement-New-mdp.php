<?php
require("db.php");

//s'il existe le token et l'id en get
if (isset($_GET["t"]) && !empty($_GET['t']) && isset($_GET["i"]) && !empty($_GET['i'])) {

    $id = htmlspecialchars($_GET['i']);
    $getToken = htmlspecialchars($_GET['t']);

    // returne true si le token est bien associé au user
    $pdoStat = $db->prepare("SELECT token from users where id_users = ?");
    $pdoStat->execute([$id]);
    $data = $pdoStat->fetch(PDO::FETCH_ASSOC);
    $token = $data['token'];

    // on compare le token du get et celui du user et on renvoi à l'index si ce n'est pas bon
    if ($getToken == $token) {
        

        if(!empty($_POST['New-mdp']) && !empty($_POST['RNew-mdp'])){
            if(strlen($_POST['New-mdp']) <= 255 && strlen($_POST['RNew-mdp']) <= 255){

                $password = htmlspecialchars($_POST["New-mdp"]);
                $password2 = htmlspecialchars($_POST["RNew-mdp"]);

                if ($password == $password2) {
                    $newPassword = password_hash($_POST["New-mdp"], PASSWORD_DEFAULT);
                    $newToken = openssl_random_pseudo_bytes(26);
                    $newToken = bin2hex($newToken);
            
                //si tout est bon en change le mot de passe et le token
                $pdoStat = $db->prepare("UPDATE users SET password_users = ?, token = ? WHERE id_users = ?");
                $pdoStat->execute([$newPassword, $newToken, $id]);
                header("location: ../../pageconnexion.php?mes=pwchange");
                } else {
                    header("location: ../../pagenewmdp.php?t=$token&i=$id&mes=samepw");
                }
            }
            else{ header("location: ../../pagenewmdp.php?t=$token&i=$id&mes=length");}
        } else { header("location: ../../pagenewmdp.php?t=$token&i=$id&mes=missinput");}
    } else { header("Location: ../../index.php");}
} else { header("Location: ../../index.php");}


