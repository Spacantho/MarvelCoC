<?php
    require("db.php");

    $max= 255;
    // erreur 1 = champs non remplis
    //  erreur 2 = nombre de character trop long
    //  erreur 3 = adresse deja utilisé
    //  erreur 5 = user deja pris
    //  erreur 4 = mdp et mdp 2 non identique
    if (isset($_POST)){

        if(isset($_POST['Pseudo']) && !empty($_POST['Pseudo'])){
            if(strlen($_POST['Pseudo']) <= $max){
                $name = htmlspecialchars($_POST['Pseudo']);

                if(isset($_POST['mail']) && !empty($_POST['mail'])){
                    if(strlen($_POST['mail']) <= $max){
                        $mail = htmlspecialchars($_POST["mail"]);

                        if(isset($_POST['password']) && !empty($_POST['password'])){
                            if(isset($_POST['password2']) && !empty($_POST['password2'])){
                                if(($_POST['password']) == ($_POST['password2'])){
                                    if(strlen($_POST['password']) <= $max){
                                        if(strlen($_POST['password2'] ) <= $max){
                                            $password = htmlspecialchars(password_hash($_POST["password"], PASSWORD_DEFAULT));

                                            $token = openssl_random_pseudo_bytes(26);
                                            $token = bin2hex($token);

                                                    $photo = "default-user.png";
                                            $sqlRequest1 = "SELECT * FROM users WHERE mail_users=:mail_users";
                                            $pdoStat1 = $db -> prepare($sqlRequest1);
                                            $pdoStat1->execute(ARRAY(
                                                ':mail_users' => $mail
                                            ));
                                            $result = $pdoStat1->fetch();
                                            if(!empty($result)){
                                                header("Location: ../../pageinscription.php?erreur=3");
                                            }
                                            else{
                                                    $sqlRequest2 = "SELECT * FROM users WHERE username_users=:username_users";
                                                $pdoStat2 = $db -> prepare($sqlRequest2);
                                                $pdoStat2->execute(ARRAY(
                                                    ':username_users' => $name
                                                    ));
                                                $result1 = $pdoStat2->fetch();
                                                if(!empty($result1)){
                                                header("Location: ../../pageinscription.php?erreur=5");
                                                }else{
                                                $sqlRequest = "INSERT INTO users (mail_users, username_users, password_users, photo_users, token, verified, id_role)
                                                                VALUES (:mail_users, :username_users, :password_users, :photo_users, :token, '0', '2');";
                                                $pdoStat = $db -> prepare($sqlRequest);
                                                $pdoStat->execute(ARRAY(
                                                    ':username_users' => $name,
                                                    ':mail_users' => $mail,
                                                    ':password_users' => $password,
                                                    ':token' => $token,
                                                    ':photo_users' => $photo
                                                ));
                                                require_once("../include/mailerValidateEmail.php");
                                                header("Location: ../../pageconnexion.php?success=1");
                                            }
                                            }
                                        }
                                        else{header("location: ../../pageinscription.php?erreur=2");}
                                    }
                                    else{header("location: ../../pageinscription.php?erreur=2");}
                                }
                                else{header("Location: ../../pageinscription.php?erreur=4");}
                            }
                            else{header("Location: ../../pageinscription.php?erreur=1");}
                        }
                        else{header("Location: ../../pageinscription.php?erreur=1");}
                    }
                    else{header("location: ../../pageinscription.php?erreur=2");}
                }
                else{header("Location: ../../pageinscription.php?erreur=1");}
            }
            else{ header("Location: ../../pageinscription.php?erreur=2");}
        }
        else{header("Location: ../../pageinscription.php?erreur=1");}
    }