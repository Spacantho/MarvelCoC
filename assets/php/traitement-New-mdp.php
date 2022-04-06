<?php
require("db.php");

if(isset($_GET['token'])){
    if(!empty($_POST['New-mdp']) && !empty($_POST['RNew-mdp'])){
        if(strlen($_POST['New-mdp']) && strlen($_POST['RNew-mdp']) <= $max){

        }
    }
    else{ header('location: ../../pagenewmdp.php?token='echo $_GET["token"];'&erreur=3');}
}