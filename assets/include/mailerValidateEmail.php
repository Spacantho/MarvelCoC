<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "anthony.tourolle08@gmail.com";
    $to = $mail;
    
    $subject = "Validation de compte";

    $message = "
    <html>
        <head>
            <title>Bonjour $name, merci d’avoir rejoint MarvelCoC.</title>
        </head>
        <body style='color:blue'>
            Nous aimerions vous confirmer que votre compte a été créé avec succès. Pour accéder à MarvelCoC, cliquez sur le lien ci-dessous.
            
            http://localhost:8888/MarvelCoC/assets/php/traitement_verif_mail.php?token=$token
            
            Si vous rencontrez des difficultés pour vous connecter à votre compte, contactez-nous à [email contact].
            
            Cordialement,
            L’équipe MarvelCoC
        </body>
    </html>";

    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";
    $headers[] = "From: 'MarvelCoC' <anthony.tourolle08@gmail.com>";

    mail($to,$subject,$message, implode("\r\n", $headers));
?>

