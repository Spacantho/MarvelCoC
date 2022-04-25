<?php
//	O:5:"Video":1:{s:11:"*_nbrView";i:0;}
require("video.php");

$sqlRequest = "SELECT view FROM video WHERE id_video = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$response['id_video']]);
$videos = $pdoStat->fetch();





$currentView = unserialize($videos[0]);
//Nombre de vues total de la vidéo à afficher
$views = $currentView->getNbrView();
$viewDate = strtotime($currentView->getTimestamp());
$currentDate = time();
$diff = $viewDate - $currentDate;
if ($diff <= 0) {
    $currentView->setDate(0);
}

var_dump($diff);

$addView = serialize($currentView);


//On écrase l'anciennne instance sérialisée
$sqlRequest = "UPDATE video SET view = ?  WHERE id_video = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$addView, $response['id_video']]);
