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


if (isset($isLiked["type_like"])) {
    var_dump($isLiked["type_like"]);
}
