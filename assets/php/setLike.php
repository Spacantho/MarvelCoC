<?php
require_once("db.php");

$idUserSession = 1; //!!! A CHANGER EN SESSION !!!!

$typeLike = $_POST["like"];
$idVideo = $_POST["vidId"];
//0 = dislike en bdd
//1 = Like en bdd

if ($typeLike == "like") {
    //On regarde si la vidéo à déja été like ou dislike
    $sqlRequest = "SELECT * FROM note WHERE id_video = ? AND type_like = ? AND id_users = ?";
    $pdoStat = $db->prepare($sqlRequest);
    $pdoStat->execute([$idVideo, 0, $idUserSession]);
    $isUnLiked = $pdoStat->fetch();

    $sqlRequest = "SELECT * FROM note WHERE id_video = ? AND type_like = ? AND id_users = ?";
    $pdoStat = $db->prepare($sqlRequest);
    $pdoStat->execute([$idVideo, 1, $idUserSession]);
    $isLiked = $pdoStat->fetch();

    //On traite en fonction de cela
    if ($isLiked == false) {
        if ($isUnLiked == false) {
            $sqlRequest = "INSERT INTO `note`(`id_video`,`id_users`,`type_like`) VALUES (?,?,?)";
            $pdoStat = $db->prepare($sqlRequest);
            $pdoStat->execute([$idVideo, $idUserSession, 1]);
        } else {
            $sqlRequest = "UPDATE note SET type_like = ? WHERE id_video =? AND id_users = ?";
            $pdoStat = $db->prepare($sqlRequest);
            $pdoStat->execute([1, $idVideo, $idUserSession]);
        }
    }
    if (!empty($isLiked)) {
        $sqlRequest = "DELETE FROM `note` WHERE id_video = ? AND id_users = ?";
        $pdoStat = $db->prepare($sqlRequest);
        $pdoStat->execute([$idVideo, $idUserSession]);
    }
}

if ($typeLike == "unlike") {
    $sqlRequest = "SELECT * FROM note WHERE id_video = ? AND type_like = ?  AND id_users = ?";
    $pdoStat = $db->prepare($sqlRequest);
    $pdoStat->execute([$idVideo, 0, $idUserSession]);
    $isUnLiked = $pdoStat->fetch();

    $sqlRequest = "SELECT * FROM note WHERE id_video = ? AND type_like = ?  AND id_users = ?";
    $pdoStat = $db->prepare($sqlRequest);
    $pdoStat->execute([$idVideo, 1, $idUserSession]);
    $isLiked = $pdoStat->fetch();

    //On traite en fonction de cela
    if ($isUnLiked == false) {
        if ($isLiked == false) {
            $sqlRequest = "INSERT INTO `note`(`id_video`,`id_users`,`type_like`) VALUES (?,?,?)";
            $pdoStat = $db->prepare($sqlRequest);
            $pdoStat->execute([$idVideo, $idUserSession, 0]);
        } else {
            $sqlRequest = "UPDATE note SET type_like = ? WHERE id_video =? AND id_users = ?";
            $pdoStat = $db->prepare($sqlRequest);
            $pdoStat->execute([0, $idVideo, $idUserSession]);
        }
    }
    if (!empty($isUnLiked)) {
        $sqlRequest = "DELETE FROM `note` WHERE id_video = ? AND id_users = ?";
        $pdoStat = $db->prepare($sqlRequest);
        $pdoStat->execute([$idVideo, $idUserSession]);
    }
}
