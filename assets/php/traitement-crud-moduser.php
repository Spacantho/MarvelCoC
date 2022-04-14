<?php

    if(isset($_GET['id'])){
        require("db.php");
        
        
        $sqlRequest = "UPDATE users SET username_users =:username_users, mail_users =:mail_users, id_role =:id_role
                              WHERE id_users=:id_users;";
        $pdoStat = $db -> prepare($sqlRequest); 
        $pdoStat->execute(Array(
            ':username_users'   =>    $_POST['username_users'],
            ':mail_users'    =>    $_POST['mail_users'],
            ':id_role'    =>    $_POST['id_role'],
            ':id_users'      =>    $_GET['id'],
        ));
            header("Location: ../../crud.php");

};