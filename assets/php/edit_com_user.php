<?php
require_once('db.php');

if (isset($_POST['comId']) && !empty($_POST['comId']) && isset($_POST['texteCom']) && !empty($_POST['texteCom'])) {

$com = htmlspecialchars($_POST['comId']);
$texte = htmlspecialchars($_POST['texteCom']);
echo "
<form id='remplace_form' method='post'>
<input type='hidden' name='commentaire_id' value='$com'>
<textarea name='remplace' id='textarea-replace' maxlength='500' autofocus required>$texte</textarea>
<button id='replace-btn' type=submit name='remplacer'><img src='assets/images/logo/validate.png' alt='Poster'></button>

</form>";
} else {
    echo "<span class='alertcommentaire' style='color: red;'>Erreur, réessayez</span>";
}

?>