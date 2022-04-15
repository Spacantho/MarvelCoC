<?php
require_once('db.php');

if (isset($_POST['comId']) && !empty($_POST['comId'])) {

$com = $_POST['comId'];
echo "<span class='alertcommentaire' style='color: green;'>Commentaire supprimé</span>";
$update = $db->prepare("UPDATE commentaire SET valide_comm = 0 WHERE id_commentaire = $com");
$update->execute();
} else {
    echo "<span class='alertcommentaire' style='color: red;'>Erreur, réessayez</span>";
}

?>