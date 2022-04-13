<?php
require("db.php");
//On selectionne nos catégories et on fetch
$sqlRequest = "SELECT * FROM categorie";
$pdoStat = $db->prepare($sqlRequest);
$pdoStat->execute();
$result = $pdoStat->fetchAll(PDO::FETCH_ASSOC);

function countVid($db, $idcategorie)
{
    $sqlRequest = "SELECT count(*) FROM video WHERE id_categorie = ? ";
    $pdoStat = $db->prepare($sqlRequest);
    $pdoStat->execute([$idcategorie]);
    $result = $pdoStat->fetch();
    return $result[0];
}
