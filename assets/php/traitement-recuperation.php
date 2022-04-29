<?php
require("db.php");

if(isset($_POST["Pseudo"]) && !empty($_POST["Pseudo"]) && isset($_POST["mail"]) && !empty($_POST["mail"])){
    if(strlen($_POST['Pseudo']) <= 30 && strlen($_POST['mail']) <= 320){
        $name = htmlspecialchars($_POST["Pseudo"]);
        $mail = htmlspecialchars($_POST["mail"]);
        
        $pdoStat = $db->prepare("SELECT id_users, token FROM users WHERE mail_users = ?");
        $pdoStat->execute([$mail]);
        $result = $pdoStat->fetch(PDO::FETCH_ASSOC);
        $id = $result["id_users"];
        $token = $result["token"];

        if(!empty($token)){

            $to = $mail;

            // Sujet
            $subject = 'Restauration de mot de passe';
            // message
            $message = "
            <html>
            <head>
                <title>Voici le mail de restauration de votre mot de passe</title>
            </head>
            <body>
                <H1>Felicitations voici l'étape final</H1>
                <p>https://localhost:8888/marvel9/MarvelCoC/pagenewmdp.php?t=$token&i=$id</p>
            </body>
            </html>
            ";

            // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
            $headers[] = 'MIME-Version: 1.0';
            $headers[] = 'Content-type: text/html; charset=iso-8859-1';
            $headers[] = 'From: <anthony.tourolle08@gmail.com>';
            // En-têtes additionnels

            // // Envoi
            mail($to, $subject, $message, implode("\r\n", $headers));
        
            header("Location: ../../pagemdplost.php?mes=mailsend");
        }
        else {header("Location: ../../pagemdplost.php?mes=noaccount");}
    } else {header("Location: ../../pagemdplost.php?mes=length");}
} else {header("Location: ../../pagemdplost.php?mes=missinput");}