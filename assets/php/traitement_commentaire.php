<?php
require_once('db.php');

$traitementCourant = null;
$user = htmlspecialchars($_POST["user_id"]);

if(isset($_POST['video_id'])){
    $traitementCourant = htmlspecialchars($_POST['video_id']);

    if( (isset($user)) && (isset($_POST['commentaire'])) && (!empty($_POST['commentaire'])) ) {
        $commentaire = htmlspecialchars($_POST['commentaire']);
        if(strlen($commentaire)<= 280) {
            echo "<span class='alertcommentaire' style='color: green; margin-bottom: 1vh;'>Commentaire envoyé avec succès</span>";
            $insert = $db->prepare('INSERT INTO commentaire(texte_commentaire, id_users, id_video, valide_comm) VALUES(?, ?, ?, 1)');
            $insert->execute(array($commentaire,$user,$traitementCourant));

        } else { echo "<span class='alertcommentaire' style='color: red;'>Commentaire trop long</span>";}
    } else { echo "<span class='alertcommentaire' style='color: red;'>Une erreur est survenue, veuillez réessayer</span>";}
} else { echo "<span class='alertcommentaire' style='color: red;'>Cette page n'existe pas</span>";}

$query = $db->prepare('SELECT * FROM commentaire INNER JOIN users ON users.id_users = commentaire.id_users WHERE id_video = ? AND valide_comm = 1 ORDER BY date_commentaire DESC LIMIT 0,1');
            $query->execute([$traitementCourant]);
            foreach ($query as $row) {
                    ?>
                <div class="visu-commentaire" id="<?php echo $row['id_commentaire'];?>">
                <div id="pp-commentaire" style="background: url(assets/uploads/pp/<?php echo $row["photo_users"]?>) center no-repeat; background-size: cover;"></div>
                        <div class="container-commentaire">
                            <div class="data-commentaire">
                            <div class="prenom_commentaire"><a href="profil.php?id=<?php echo $row['id_users']; ?>"><?php echo $row['username_users']; ?></a></div>
                                    <div id="info-com">
    
                                        <?php $date = new DateTime($row['date_commentaire']);?>
                                        <div><?php echo $date->format('d-m-Y H:i');?></div>
                                        
                                        <?php 
                                            if($user == $row['id_users']) {
                                            ?>
                                                <div id="crud_com">
                                                    <a onclick="editComment(<?php echo $row['id_commentaire'].', \''.$row['texte_commentaire'].'\''; ?>)" class="editUserCom"><i class="fa-solid fa-pen"></i></a>
                                                    <a onclick="deleteComment(<?php echo $row['id_commentaire']; ?>)" class="deleteUserCom"><i class="fa-solid fa-trash"></i></a>
                                                </div>
                                            <?php
                                            }
                                        ?>
    
    
                                </div>
                            </div>
                        <div class="texte-commentaire"><?php echo $row['texte_commentaire'];?></div>
                    </div>
                </div>
            <?php }
            ?>