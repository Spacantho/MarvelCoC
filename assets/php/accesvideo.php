<?php 
require("db.php");

$video  = "SELECT * FROM video ORDER BY date_video DESC LIMIT 10";

$infovideo = $db->prepare($video);

$infovideo->execute();

$executevideo = $infovideo ->fetchAll(PDO::FETCH_ASSOC);

$threepoint = '...';