<?php 
require "db.php";

// récupere les données du formulaire de "edit_pseudo_user.php"
if (isset($_POST['remplace_pseudo']) && !empty($_POST['remplace_pseudo']) && isset($_POST['id_user']) && !empty($_POST['id_user']) ) {
    $user = $_POST['remplace_pseudo'];
    $id = $_POST['id_user'];

    if (strlen($user) <= 20) {

        // Select si le nom d'utilisateur existe
            $pdoStat = $db->prepare("SELECT username_users FROM users WHERE username_users = ?");
            $pdoStat->execute([$user]);
            $result = $pdoStat->fetch(PDO::FETCH_ASSOC);

        // Si le pseudo existe déjà en bdd alors on retourne un message d'erreur
            if($result) {
                header("location:../../profil.php?id=$id&mes=err_pseudo");
            } 
        // Sinon on update le pseudo depuis l'id de l'user   
            else {
                $update = $db->prepare("UPDATE users SET username_users = ? WHERE id_users = ?");
                $update->execute([$user, $id]);
                header("location:../../profil.php?id=$id&mes=succes_pseudo");
            }
    } else {
        header("location:../../profil.php?id=$id&mes=maxlength");
    }
} else {
   header("location:../../profil.php?id=$id&mes=champ_manquant");
}

?>