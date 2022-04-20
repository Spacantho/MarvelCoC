<?php

    if(isset($_GET['id'])){
        require("db.php");
        var_dump($_GET['id']);
        
        $sqlRequest = "UPDATE video SET valide =:valide
                              WHERE id_video=:id_video;";
        $pdoStat = $db -> prepare($sqlRequest); 
        $pdoStat->execute(Array(
            ':valide'    =>    '1',
            ':id_video'      =>    $_GET['id'],
        ));
            header("Location: ../../crud.php?success=1");

};