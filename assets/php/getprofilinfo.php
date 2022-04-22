<?php 
require("db.php");

//On appel notre user
$id_user = htmlspecialchars($_GET["id"]);
$mine = false;

//On selectionne notre profil et on fetch
$pdoStat = $db->prepare("SELECT id_users, mail_users, username_users, photo_users FROM users WHERE id_users = ?");
$pdoStat->execute([$id_user]);
$result = $pdoStat->fetch(PDO::FETCH_ASSOC);

if ($id_user == $_SESSION["sess_user_id"]){        
    $mine = true;
}

?>