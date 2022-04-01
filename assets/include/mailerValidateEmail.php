<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "anthony.tourolle08@gmail.com";
    $to = $mail;
    
    $subject = "Validation de compte";

    $message = "
    Bonjour $name,
    Merci d’avoir rejoint MarvelCoC.
    
    Nous aimerions vous confirmer que votre compte a été créé avec succès. Pour accéder à MarvelCoC, cliquez sur le lien ci-dessous.
    
    http://localhost:8888/MarvelCoC/assets/php/traitement_verif_mail.php?token=$token
    
    Si vous rencontrez des difficultés pour vous connecter à votre compte, contactez-nous à [email contact].
    
    Cordialement,
    L’équipe MarvelCoC";

    $headers = "From :" . $from;
    mail($to,$subject,$message, $headers);
?>

