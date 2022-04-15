<?php
require_once("db.php");
if (!isset($_POST["like"]) || $_POST["like"] == "") {
    header("Location: ../../template_video.php");
}
$typeLike = $_POST["like"];

if ($typeLike == "like") {
    echo "like !";
/*     $sqlRequest = "INSERT INTO `livre`(`Titre`, `Auteur`, `Editeur`, `Année`, `Prix HT`) VALUES ([value-1],[value-2],[value-3],[value-4],[value-5])";
    $pdoStat = $db->prepare($sqlRequest);
    $pdoStat->execute([]);
    $videos = $pdoStat->fetchAll(PDO::FETCH_ASSOC); */
}
if ($typeLike == "unlike") {
    echo "dislike !";
}
