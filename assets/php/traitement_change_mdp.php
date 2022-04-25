<?php 
require "db.php";

// récupere les données du formulaire de "edit_pseudo_user.php"
if (isset($_POST['id_user']) && !empty($_POST['id_user']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['first_password']) && !empty($_POST['first_password']) && isset($_POST['second_password']) && !empty($_POST['second_password'])) {
    $id = htmlspecialchars($_POST['id_user']);
    $old = htmlspecialchars($_POST['old_password']);
    $first = htmlspecialchars($_POST['first_password']);
    $second = htmlspecialchars($_POST['second_password']);

    if (strlen($old) <= 255 && strlen($first) <= 255 && strlen($second) <= 255) {
        
        if ($first == $second) {

            $pdoStat = $db->prepare("SELECT password_users FROM users WHERE id_users = ?");
            $pdoStat->execute([$id]);
            $result = $pdoStat->fetch(PDO::FETCH_ASSOC);

            if (password_verify($old, $result['password_users'])) {
            
                $password = (password_hash($first, PASSWORD_DEFAULT));
                $pdoStat = $db->prepare("UPDATE users SET password_users = ? WHERE id_users = ?");
                $pdoStat->execute([$password, $id]);
                header("location:../../profil.php?id=$id&mes=pwchangeok");
                
            } else {
                header("location:../../change_mdp.php?id=$id&mes=olderr");
            }
        } else {
           header("location:../../change_mdp.php?id=$id&mes=samepw"); 
        }
    } else {
        header("location:../../change_mdp.php?id=$id&mes=mdplength");
    }
} else {
    header("location:../../change_mdp.php?id=$id&mes=missing_input");
}