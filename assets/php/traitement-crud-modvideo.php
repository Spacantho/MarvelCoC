<?php

$max= 255;
$max2= 500;
// erreur 1 = champs non remplis
//  erreur 2 = nombre de character trop long
//  erreur 3 = adresse deja utilisé
//  erreur 5 = user deja pris
//  erreur 4 = mdp et mdp 2 non identique
//  erreur 6 = compte non créer
if(isset($_GET['id'])){
    require("db.php");
    $id_video = $_GET['id'];
    $id_role = $_GET['role'];
    
    if(isset($_POST['titre_video']) && !empty($_POST['titre_video'])){
        if(strlen($_POST['titre_video']) <= $max){
            if(isset($_POST['description_video']) && !empty($_POST['description_video'])){
                if(strlen($_POST['description_video']) <= $max2){
                    if(isset($_POST['miniature_video']) && !empty($_POST['miniature_video'])){
                        if(strlen($_POST['miniature_video']) <= $max){
                            if(isset($_POST['lien_video']) && !empty($_POST['lien_video'])){
                                if(strlen($_POST['lien_video']) <= $max){
                                                $sqlRequest = "UPDATE video SET titre_video =:titre_video, description_video =:description_video, miniature_video =:miniature_video, lien_video =:lien_video, id_categorie =:id_categorie
                                                                      WHERE id_video=:id_video;";
                                                $pdoStat = $db -> prepare($sqlRequest); 
                                                $pdoStat->execute(Array(
                                                    ':titre_video'   =>    $_POST['titre_video'],
                                                    ':description_video'    =>    $_POST['description_video'],
                                                    ':miniature_video'    =>    $_POST['miniature_video'],
                                                    ':lien_video'    =>    $_POST['lien_video'],
                                                    ':id_categorie'    =>    $_POST['id_categorie'],
                                                    ':id_video'    =>    $id_video
                                                ));
                                                    header("Location: ../../crud.php?success=1");
                                }
                                else{header("Location: ../../crud-modvideo.php?erreur=2&id=$id_video&role=$id_role");}
                            }
                            else{header("Location: ../../crud-modvideo.php?erreur=1&id=$id_video&role=$id_role");}
                        }
                        else{header("Location: ../../crud-modvideo.php?erreur=2&id=$id_video&role=$id_role");}
                    }
                    else{header("Location: ../../crud-modvideo.php?erreur=1&id=$id_video&role=$id_role");}
                }
                else{header("Location: ../../crud-modvideo.php?erreur=2&id=$id_video&role=$id_role");}
            }
            else{header("Location: ../../crud-modvideo.php?erreur=1&id=$id_video&role=$id_role");}
        }
        else{header("Location: ../../crud-modvideo.php?erreur=2&id=$id_video&role=$id_role");} 
    }
    else{header("Location: ../../crud-modvideo.php?erreur=1&id=$id_video&role=$id_role");}
};