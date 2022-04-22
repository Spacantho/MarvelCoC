<?php
require_once('db.php');

if (isset($_POST['com']) && !empty($_POST['com']) && isset($_POST['id']) && !empty($_POST['id']) ) {

$com = htmlspecialchars($_POST['com']);
$id = htmlspecialchars($_POST['id']);
echo "<span class='alertcommentaire' style='color: green; margin-left: 15px;'>Commentaire modifié</span>";
$update = $db->prepare("UPDATE commentaire SET texte_commentaire = ? WHERE id_commentaire = ?");
$update->execute([$com, $id]);
echo "<div class='texte-commentaire'>$com</div>";
} else {
    echo "<span class='alertcommentaire' style='color: red;'>Erreur, réessayez</span>";
}

?>