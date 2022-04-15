<?php

    if(isset($_GET['id'])){
        require("db.php");
        var_dump($_GET['id']);
        
        $sqlRequest = "UPDATE commentaire SET valide_comm =:valide_comm
                              WHERE id_commentaire=:id_commentaire;";
        $pdoStat = $db -> prepare($sqlRequest); 
        $pdoStat->execute(Array(
            ':valide_comm'    =>    '1',
            ':id_commentaire'      =>    $_GET['id'],
        ));
            header("Location: ../../crud.php");

};