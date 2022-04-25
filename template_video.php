<?php

session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("location:index.php?validate_err");
}

require_once("assets/php/db.php");
require("assets/php/getNbVideo.php");
require("assets/php/getlike.php");


if ((isset($_GET['video'])) && (!empty($_GET['video']))) {
    $video = $_GET['video'];
} else {
    header('location:templateCategorie.php?err=noget');
}

$user_id = $_SESSION["sess_user_id"];
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
    <script src="assets/js/edit_com_user.js" defer></script>
    <script src="assets/js/traitement_edit_com_user.js" defer></script>
    <title>Vidéo</title>
</head>

<body>

    <?php require_once("assets/include/navbar.php"); ?>

    <div id="corps-video">

        <section id="video">

            <?php
            $query = $db->prepare('SELECT * FROM video INNER JOIN users ON users.id_users = video.id_users WHERE id_video = ?');
            $query->execute([$video]);
            $response = $query->fetch(PDO::FETCH_ASSOC);

            require("assets/php/countview.php");

            ?>
            <h2 id="titre-video"><?php echo $response['titre_video'] ?></h2>
            <?php
            if ($response['typelien_video'] === "file" ) { ?>

                <video id="video-player" controls>
                    <source src="assets/uploads/<?php echo $response['lien_video'] ?>" type="video/mp4">
                    <p>Votre navigateur ne prend pas en charge les vidéos HTML5.</p>
                </video>

               <?php } elseif ($response['typelien_video'] === "youtube") { ?>
                   <iframe id="video-player" src="<?php echo $response['lien_video'] ?>" title="<?php echo $response['titre_video'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               <?php } else {
                   echo "<span class='alertcommentaire' style='color: red;'>Aucune vidéo n'a été trouvée</span>";
               }
            ?>

            <!-- Like/ dislike -->
            <div class="underVid">
                <div class="likeContainer">

                    <div id="auteur">
                        <div style="background: url(assets/uploads/pp/<?php echo $response["photo_users"]?>) center no-repeat; background-size: cover; "></div>
                        <p><?php echo $response["username_users"]?></p>
                    </div>
            
                <div id="like_dislike">
                    <?php
                    if (isset($isLiked["type_like"])) {
                        if ($isLiked["type_like"] == 1) { ?>

                            <div class="likeButton" id="likeButton">
                                <a id="click_unlike_like" data-type_click="like">
                                    <i class="fa-solid fa-thumbs-up activeL" id="likeicon"></i>
                                </a>
                            </div>
                            <div class="dislikeButton " id="dislikeButton">
                                <a id="click_unlike_like" data-type_click="unlike">
                                    <i class="fa-solid fa-thumbs-down" id="dislikeicon"></i>
                                </a>
                            </div>
                        <?php } ?>
                        <?php if ($isLiked["type_like"] == 0) { ?>
                            <div class="likeButton" id="likeButton">
                                <a id="click_unlike_like" data-type_click="like">
                                    <i class="fa-solid fa-thumbs-up" id="likeicon"></i>
                                </a>
                            </div>
                            <div class="dislikeButton " id="dislikeButton">
                                <a id="click_unlike_like" data-type_click="unlike">
                                    <i class="fa-solid fa-thumbs-down activeD" id="dislikeicon"></i>
                                </a>
                            </div>
                        <?php }
                    } else { ?>

                        <div class="likeButton" id="likeButton">
                            <a id="click_unlike_like" data-type_click="like">
                                <i class="fa-solid fa-thumbs-up" id="likeicon"></i>
                            </a>
                        </div>
                        <div class="dislikeButton" id="dislikeButton">
                            <a id="click_unlike_like" data-type_click="unlike">
                                <i class="fa-solid fa-thumbs-down " id="dislikeicon"></i>
                            </a>
                        </div>
                    <?php } ?>
                    </div>
                </div>
                <div class="fillbarContainer">
                    <div class="fillbar">
                        <div class="gauge" <?php echo " style= width:$ratioLike%;" ?>></div>
                    </div>
                </div>

            </div>

            <div class="info_vid"><?php echo $views.' vues - ' ?> 
                <?php 
                    $date_vid = $response['date_video'];
                    setlocale(LC_TIME, "fr_FR");
                    echo strftime("%A %d %B %G", strtotime($date_vid));
                ?>
            </div>

            <h3 id="description">Description : <br></h3>
            <p id="desc"><?php echo $response['description_video'] ?></p>
            <button onclick="readMore()" id="readButton">Voir plus...</button>
        </section>



        <section id="section-commentaire">
            <form id="comment_form" method="post">
                <input type="hidden" name="user_id" value="<?php echo $user_id; ?>">
                <input type="hidden" name="video_id" value="<?php echo $video; ?>">
                <textarea name="commentaire" id="textarea-commentaire" maxlength="280" placeholder="Votre commentaire..." required></textarea>
                <div id="commentaire-detail">
                    <div id="counter-commentaire"></div>
                    <button id="commentaire-btn" type=submit name="commenter"><img src="assets/images/logo/validate.png" alt="Poster"></button>
                </div>
            </form>

            <h3><?php echo showNbCom($db, $video); ?></h3>

            <div id="scrolled">
                <?php
                $query = $db->prepare('SELECT * FROM commentaire INNER JOIN users ON users.id_users = commentaire.id_users WHERE id_video = ? AND valide_comm = 1 AND verified = 1 ORDER BY date_commentaire');
                $query->execute([$video]);
                foreach ($query as $row) {
                ?>
                    <div class="visu-commentaire" id="<?php echo $row['id_commentaire']; ?>">
                    <div id="pp-commentaire" style="background: url(assets/uploads/pp/<?php echo $row["photo_users"]?>) center no-repeat; background-size: cover;"></div>
                        <div class="container-commentaire">
                            <div class="data-commentaire">
                                <div class="prenom_commentaire"><a href="profil.php?id=<?php echo $row['id_users']; ?>"><?php echo $row['username_users']; ?></a></div>
                                <div id="info-com">


                                    <?php $date = new DateTime($row['date_commentaire']); ?>
                                    <div><?php echo $date->format('d-m-Y H:i'); ?></div>

                                    <?php
                                    if ($user_id == $row['id_users']) {
                                    ?>
                                        <div id="crud_com">
                                            <a onclick="editComment(<?php echo $row['id_commentaire'] . ', \'' . $row['texte_commentaire'] . '\''; ?>)" class="editUserCom"><i class="fa-solid fa-pen"></i></a>
                                            <a onclick="deleteComment(<?php echo $row['id_commentaire']; ?>)" class="deleteUserCom"><i class="fa-solid fa-trash"></i></a>
                                        </div>
                                    <?php
                                    }
                                    ?>


                                </div>
                            </div>
                            <div class="texte-commentaire"><?php echo $row['texte_commentaire']; ?></div>
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
    <script src="assets/js/like.js" defer></script>
</body>

</html>