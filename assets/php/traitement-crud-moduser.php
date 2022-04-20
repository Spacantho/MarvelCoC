<?php
    $max= 255;
    // erreur 1 = champs non remplis
    //  erreur 2 = nombre de character trop long
    //  erreur 3 = adresse deja utilisé
    //  erreur 5 = user deja pris
    //  erreur 4 = mdp et mdp 2 non identique
    //  erreur 6 = compte non créer
    if(isset($_GET['id'])){
        require("db.php");
        $id_users = $_GET['id'];
        $id_role = $_GET['role'];
        
        if(isset($_POST['username_users']) && !empty($_POST['username_users'])){
            if(strlen($_POST['username_users']) <= $max){
                if(isset($_POST['photo_users']) && !empty($_POST['photo_users'])){
                    if(strlen($_POST['photo_users']) <= $max){
                                                    $sqlRequest = "UPDATE users SET username_users =:username_users,photo_users =:photo_users, id_role =:id_role
                                                                          WHERE id_users=:id_users;";
                                                    $pdoStat = $db -> prepare($sqlRequest); 
                                                    $pdoStat->execute(Array(
                                                        ':username_users'   =>    $_POST['username_users'],
                                                        ':photo_users'    =>    $_POST['photo_users'],
                                                        ':id_role'    =>    $_POST['id_role'],
                                                        ':id_users'      =>    $id_users
                                                    ));
                                                        header("Location: ../../crud.php?success=1");
                    }
                    else{header("Location: ../../crud-moduser.php?erreur=2&id=$id_users&role=$id_role");}
                }
                else{header("Location: ../../crud-moduser.php?erreur=1&id=$id_users&role=$id_role");}
            }
            else{header("Location: ../../crud-moduser.php?erreur=2&id=$id_users&role=$id_role");} 
        }
        else{header("Location: ../../crud-moduser.php?erreur=1&id=$id_users&role=$id_role");}
};