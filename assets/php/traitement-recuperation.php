<?php
require("db.php");
// erreur 1 = champs non remplis
//  erreur 2 = nombre de character trop long
//  erreur 6 = compte non créer
$max = 255;


if(isset($_POST)){
    if(isset($_POST["Pseudo"]) && !empty($_POST["Pseudo"])){
        if(strlen($_POST['Pseudo']) <= $max){
            $name = htmlspecialchars($_POST["Pseudo"]);
            if(isset($_POST["mail"]) && !empty($_POST["mail"])){
                if(strlen($_POST['Pseudo']) <= $max){
                    $mail = htmlspecialchars($_POST["mail"]);

                    $sqlRequest = "SELECT * FROM users WHERE mail_users=:mail_users";
                    $pdoStat = $db -> prepare($sqlRequest);
                    $pdoStat->execute(ARRAY(
                        ':mail_users' => $mail
                    ));
                    $result = $pdoStat->fetch();
                    $token = $result[5];
                    if(empty($result)){
                        header("Location: ../../pageinscription.php?erreur=6");
                    }
                    else{
                        $to  = $_POST["mail"]; // notez la virgule
     
                        // Sujet
                         $subject = 'restauration de mot de passe';

                        // message
                         $message = "
                         <html>
                           <head>
                           <title>Voici le mail de restauration de votre mot de passe</title>
                           </head>
                           <body>
                           <H1>Felicitations voici l'étape final</H1>
                           <p><a href='../../pagenewmdp.php?r=$token'> cliquer ici </a></p>
                           </body>
                         </html>
                         ";

                         // Pour envoyer un mail HTML, l'en-tête Content-type doit être défini
                         $headers[] = 'MIME-Version: 1.0';
                         $headers[] = 'Content-type: text/html; charset=iso-8859-1';
                         $headers[] = 'From: "envoi" <darksider21@hotmail.fr>';
                         // En-têtes additionnels


                         // // Envoi
                          mail($to, $subject, $message, implode("\r\n", $headers));
                    

                        header("Location: ../../pagemdplost.php?envoi=1");

















                    }
                }
                else{ header("Location: ../../pageinscription.php?erreur=2");}
            }
            else{ header("Location: ../../pageinscription.php?erreur=1");}
        }
        else{ header("Location: ../../pageinscription.php?erreur=2");}
    }
    else{ header("Location: ../../pageinscription.php?erreur=1");}
}