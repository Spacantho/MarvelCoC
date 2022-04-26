<?php

if (isset($_POST['nom'])&&isset($_POST['to'])&&isset($_POST['object'])&&isset($_POST['message'])&&isset($_POST['sender_mail'])){

    echo'Mail envoyé';
    $to = $_POST['to'];
    $subject = $_POST['object'];
    $message = $_POST['message'];
    mail($to,$subject,$message);

}

?>