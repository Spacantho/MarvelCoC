<?php
//	O:5:"Video":1:{s:11:"*_nbrView";i:0;}
require("video.php");

//On va chercher notre instance en bdd
$sqlRequest = "SELECT view FROM video WHERE id_video = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$response['id_video']]);
$videos = $pdoStat->fetch();

$currentView = unserialize($videos[0]);

//Nombre de vues total de la vidéo à afficher
$views = $currentView->getNbrView();

//Date enregistrée dans la classe sérializée
$viewDate = strtotime($currentView->getTimestamp());

//Date actuelle
$currentDate = time();
$diff = $viewDate - $currentDate;

//Si le compteur arrive à 0
if ($diff <= 0) {
    $currentView->setDate(0);
}
$addView = serialize($currentView);
//On écrase l'anciennne instance sérialisée
$sqlRequest = "UPDATE video SET view = ?  WHERE id_video = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$addView, $response['id_video']]);
