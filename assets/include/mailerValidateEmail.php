<?php
    ini_set( 'display_errors', 1 );
    error_reporting( E_ALL );
    $from = "anthony.tourolle08@gmail.com";
    $to = $mail;
    
    $subject = "Validation de compte";

    $message = "
    <html>
        <head>
            <title>Validation du compte</title>
            <style>
                body {
                    font-family: sans-serif;
                    width: 70%;
                    margin: auto;
                }
                h2 {
                    text-align: center;
                }
            </style>
        </head>
        <body>
            <h2>Bonjour $name, merci d’avoir rejoint MarvelCoC.</h2><br>
            <p>Nous aimerions vous confirmer que votre compte a été créé avec succès.</p>
            <p>Pour accéder à MarvelCoC, cliquez sur le lien ci-dessous: </p>
            
            <p>http://localhost:8888/marvel9/MarvelCoC/assets/php/traitement_verif_mail.php?token=$token</p>
            
            <p>Si vous rencontrez des difficultés pour vous connecter à votre compte, contactez-nous à [email contact].</P>
            
            <p>Cordialement,<br/>
            L’équipe MarvelCoC</p>
        </body>
    </html>";

    $headers[] = "MIME-Version: 1.0";
    $headers[] = "Content-type: text/html; charset=iso-8859-1";
    $headers[] = "From: 'MarvelCoC' <anthony.tourolle08@gmail.com>";

    mail($to,$subject,$message, implode("\r\n", $headers));
?>

