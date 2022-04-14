<?php
// if (!isset($_POST['categorie']) || $_POST['categorie'] == null) {
//     header('Location: index.php');
// }

$categorie = $_GET['categorie'];
require("db.php");
//On selectionne nos catégories et on fetch
$sqlRequest = "SELECT * FROM video WHERE id_categorie = ?";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute([$categorie]);
$videos = $pdoStat->fetchAll(PDO::FETCH_ASSOC);
