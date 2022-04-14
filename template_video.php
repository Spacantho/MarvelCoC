<?php require_once("assets/php/db.php");

    if ( (isset($_GET['video'])) && (!empty($_GET['video'])) ) {
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="assets/js/commentaire.js" defer></script>
    <title>Vidéo</title>
</head>
<body>
    
    <?php require_once("assets/include/navbar.php");?>

    <div id="corps-video">
    <section id="video">
        <?php
            $query = $db->prepare('SELECT * FROM video');
            $query->execute();
            foreach ($query as $row) {
                if ($video = $row['id_video']) {
                ?>
                <h2 id="titre-video"><?php echo $row['titre_video']?></h2>
                <video id="video-player" controls>
                    <source src="<?php echo $row['lien_video']?>" type="video/mp4">
                    <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>
                </video>
                <p>Description : <br><?php echo $row['description_video']?></p>
                <button onclick="myFunction()" id="readButton">Voir plus...</button>
                <?php
                    }
                }
            ?>
    </section>
    <section id="section-commentaire">
        <form id="comment_form" method="post">
            <input type="hidden" name="user_id" value="<?php $user=32; echo $user; ?>">
            <input type="hidden" name="video_id" value="<?php echo $video; ?>">
            <textarea name="commentaire" id="textarea-commentaire" maxlength="255" placeholder="Votre commentaire..." required></textarea>
            <span id="counter-commentaire">255</span>
            <button id="commentaire-btn" type=submit name="commenter"><img src="assets/images/logo/validate.png" alt="Poster"></button>
        </form>
        <h3 id="base_com">Commentaires :</h3>
        <?php
            $query = $db->prepare('SELECT * FROM commentaire INNER JOIN users ON users.id_users = commentaire.id_users ORDER BY date_commentaire');
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
            <?php
                }
            }
            ?>
        </section>
    </div>
    
    <script>src="count_commentaire_caractere.js"</script>
    <script src="assets/js/readMoreDesc.js"></script>
    <script src="assets/js/navbar.js"></script>
</body>
</html>