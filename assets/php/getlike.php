<?php
$idUserSession = 1; // A CHANGER !!!!!!!!


if (isset($_GET["video"]) && !empty($_GET["video"])) {
    $idVideo = $_GET['video'];
} else {
    header('Location: index.php');
}
//Pré-affichage du like
$sqlRequest = "SELECT * FROM note WHERE id_video = ? AND id_users = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$idVideo, $idUserSession]);
$isLiked = $pdoStat->fetch();


//Like
$sqlRequest =  "SELECT count(*) FROM note WHERE id_video = ? AND type_like = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$idVideo, 1]);
$numberLike = $pdoStat->fetch();

$sqlRequest =  "SELECT count(*) FROM note WHERE id_video = ? AND type_like = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$idVideo, 0]);
$numberUnlike = $pdoStat->fetch();


if ($numberUnlike[0] == 0) {
    $ratioLike = 0;
} else if ($numberLike[0] == 0) {
    $ratioLike = 100;
} else {
    $ratioLike  = ($numberUnlike[0] / ($numberUnlike[0] + $numberLike[0])) * 100;
}
