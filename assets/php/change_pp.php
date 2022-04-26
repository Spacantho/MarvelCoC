<?php
require_once('db.php');

if (isset($_POST['id']) && !empty($_POST['id'])) {

$id = htmlspecialchars($_POST['id']);
echo "
<form id='form_pp' action='assets/php/traitement_change_pp.php' method='POST' enctype='multipart/form-data'>
    <input type='hidden' name='id' value='$id'>
    <input type='file' name='file'>
    <button type='submit'>Éditer</button>
</form>";
} else {
    echo "<span class='alertcommentaire' style='color: red; align-self: center;'>Erreur, réessayez</span>";
}

?>