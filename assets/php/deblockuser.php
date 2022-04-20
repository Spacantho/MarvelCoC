<?php

if(isset($_GET['id'])){
    require("db.php");
    
    
    $sqlRequest = "UPDATE users SET verified =:verified
                          WHERE id_users=:id_users;";
    $pdoStat = $db -> prepare($sqlRequest); 
    $pdoStat->execute(Array(
        ':verified'    =>    '1',
        ':id_users'      =>    $_GET['id'],
    ));
        header("Location: ../../crud.php?success=1");

};