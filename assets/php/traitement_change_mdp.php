<?php 
require "db.php";

// récupere les données du formulaire de "edit_pseudo_user.php"
if (isset($_POST['id_user']) && !empty($_POST['id_user']) && isset($_POST['old_password']) && !empty($_POST['old_password']) && isset($_POST['first_password']) && !empty($_POST['first_password']) && isset($_POST['second_password']) && !empty($_POST['second_password'])) {
    $id = htmlspecialchars($_POST['id_user']);
    $old = $_POST['old_password'];
    $first = $_POST['first_password'];
    $second = $_POST['second_password'];


    // comparer old mdp et mdp bdd
    // comparer first et second
    // insert new mdp

    if (strlen($old) <= 255 && strlen($first) <= 255 && strlen($second) <= 255) {

    } else {
        header("location:../../change_mdp.php?id=$id&mes=mdplength");
    }
} else {
    header("location:../../change_mdp.php?id=$id&mes=missing_input");
}




/* $pdoStat = $db->prepare("SELECT id_users, mail_users, username_users, photo_users FROM users WHERE id_users = ?");
$pdoStat->execute([$id_user]);
$result = $pdoStat->fetch(PDO::FETCH_ASSOC); */
?>