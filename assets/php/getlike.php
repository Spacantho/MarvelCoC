<?php
require_once('db.php');
if (isset($_GET["video"]) && !empty($_GET["video"])) {
    $idVideo = $_GET['video'];
} else {
    header('Location: index.php');
}

$sqlRequest = "SELECT * FROM note WHERE id_video = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$idVideo]);
$isLiked = $pdoStat->fetch();


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
} else if ($numberlike[0] == 0) {
    $ratioLike = 1;
} else {
    $ratioLike = $numberUnlike[0] / $numberlike[0];
}
