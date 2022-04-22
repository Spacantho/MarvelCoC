<?php
require_once('db.php');

if (isset($_POST['id']) && !empty($_POST['id']) && isset($_POST['username']) && !empty($_POST['username'])) {

$username = htmlspecialchars($_POST['username']);
$id = $_POST['id'];
echo "
<form action='assets/php/traitement_edit_pseudo_user.php' method='post' style='display: inline-flex;'>
<input type='hidden' name='id_user' value='$id'>
<textarea name='remplace_pseudo' id='textarea-replace' maxlength='20' autofocus required>$username</textarea>
<button id='replace-btn' type=submit name='remplacer'><img src='assets/images/logo/validate.png' alt='Poster'></button>
</form>";
} else {
    echo "<span class='alertcommentaire' style='color: red; align-self: center;'>Erreur, réessayez</span>";
}

?>