<?php
require_once('db.php');

$traitementCourant = null;
$user = htmlspecialchars($_POST["user_id"]);

if(isset($_POST['video_id'])){
    $traitementCourant = htmlspecialchars($_POST['video_id']);

    if( (isset($user)) && (isset($_POST['commentaire'])) && (!empty($_POST['commentaire'])) ) {
        $commentaire = htmlspecialchars($_POST['commentaire']);
        if(strlen($commentaire)<= 255) {
            $insert = $db->prepare('INSERT INTO commentaire(texte_commentaire, id_users, id_video) VALUES(?, ?, ?)');
            $insert->execute(array($commentaire,$user,$traitementCourant));

        } else { echo "<span class='error' style='color: red;'>Commentaire trop long</span>";}
    } else { echo "<span class='error' style='color: red;'>Une erreur est survenue, veuillez réessayer</span>";}
} else { echo "<span class='error' style='color: red;'>Cette page n'existe pas</span>";}

$query = $db->prepare('SELECT * FROM commentaire INNER JOIN users ON users.id_users = commentaire.id_users ORDER BY id_commentaire DESC LIMIT 0,1');
            $query->execute();
            foreach ($query as $row) {
                if ($video = $row['id_video']) {
            ?>
            <div class="visu-commentaire">
                <div class="pp-commentaire"><img src="<?php echo $row['photo_users'];?>"></div>
                    <div class="container-commentaire">
                        <div class="data-commentaire">
                            <div class="prenom_commentaire"><?php echo $row['username_users']; ?></div>
                            <?php $date = new DateTime($row['date_commentaire']);?>
                            <div><?php echo $date->format('d-m-Y H:i');?></div>
                        </div>
                        <div class="texte-commentaire"><?php echo $row['texte_commentaire'];?></div>
                </div>
            </div>
            <?php }
            }?>