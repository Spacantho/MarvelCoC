
<?php require_once("assets/php/db.php");
    require("assets/php/getNbVideo.php");



if ((isset($_GET['video'])) && (!empty($_GET['video']))) {
    $video = $_GET['video'];
} else {
    header('location:templateCategorie.php?err=noget');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/video.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <script src="https://kit.fontawesome.com/31b5087217.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/commentaire.js" defer></script>
    <script src="assets/js/delete_com_user.js" defer></script>
    <title>Vidéo</title>
</head>

<body>

    <?php require_once("assets/include/navbar.php"); ?>

    <div id="corps-video">

        <section id="video">

            <?php
            $query = $db->prepare('SELECT * FROM video WHERE id_video = ?');
            $query->execute([$video]);
            $response = $query->fetch(PDO::FETCH_ASSOC);
            ?>
            <h2 id="titre-video"><?php echo $response['titre_video'] ?></h2>
            <video id="video-player" controls>
                <source src="<?php echo $response['lien_video'] ?>" type="video/mp4">
                <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>

            </video>
            <p>Description : <br><?php echo $response['description_video'] ?></p>
            <button onclick="myFunction()" id="readButton">Voir plus...</button>
    </section>



    <section id="section-commentaire">
        <form id="comment_form" method="post">
            <input type="hidden" name="user_id" value="<?php $user=32; echo $user; ?>">
            <input type="hidden" name="video_id" value="<?php echo $video; ?>">
            <textarea name="commentaire" id="textarea-commentaire" maxlength="255" placeholder="Votre commentaire..." required></textarea>
            <div id="commentaire-detail">
                <div id="counter-commentaire"></div>
                <button id="commentaire-btn" type=submit name="commenter"><img src="assets/images/logo/validate.png" alt="Poster"></button>
            </div>
        </form>

        <h3><?php echo showNbCom($db, $video); ?></h3>

        <div id="scrolled">
        <?php
            $query = $db->prepare('SELECT * FROM commentaire INNER JOIN users ON users.id_users = commentaire.id_users WHERE id_video = ? AND valide_comm = 1 ORDER BY date_commentaire');
            $query->execute([$video]);
            foreach ($query as $row) {
                ?>
            <div class="visu-commentaire" id="<?php echo $row['id_commentaire'];?>">
                <div class="pp-commentaire"><img src="<?php echo $row['photo_users'];?>"></div>
                    <div class="container-commentaire">
                        <div class="data-commentaire">
                            <div class="prenom_commentaire"><?php echo $row['username_users']; ?></div>
                                <div id="info-com">

                                    <?php $date = new DateTime($row['date_commentaire']);?>
                                    <div><?php echo $date->format('d-m-Y H:i');?></div>
                                    
                                    <?php 
                                        $user = 32;
                                        if($user == $row['id_users']) {
                                        ?>
                                            <div id="crud_com">
                                            <i class="fa-solid fa-pen"></i>
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

            <?php
                }
            ?>
            </div>   
        </section>
    </div>
  
    <script src="assets/js/readMoreDesc.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/like.js"></script>
</body>

</html>