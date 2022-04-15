<?php

function countCom($db, $idvideo) {
    $count = $db->prepare("SELECT COUNT(*) FROM commentaire WHERE id_video = ? AND valide_comm = 1");
    $count->execute([$idvideo]);
    $nBcom = $count->fetch();
    return($nBcom[0]);
}

function showNbCom($db, $video) {

    $countCom = countCom($db, $video);

            if ($countCom > 1) {
                return countCom($db, $video)." commentaires";
            } else {
                return countCom($db, $video)." commentaire";
            }
}
?>