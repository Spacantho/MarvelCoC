<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>Page mot de passe perdu</title>
</head>
<body>
    <?php
        if(!empty($_GET['envoi'])){
            $envoi = $_GET['envoi'];}
    ?>
    <div class="box-body">
        <div class="mask-body">
            <div class="bandeau"></div>
                <div class="box-titre-image">
                    <div class="image-titre"></div>
                </div>
                <div class="box-body-input">
                    <div class="box-imput">
                        <div class="titre-page-info"><h2>MOT DE PASSE PERDU</h2></div>
                        <div class="message-php">
                            <?php if(!empty($_GET['envoi'])){
                                    if($envoi == '1')  {
                            ?><p class="color-success">mail envoyer</p>
                            <?php    
                                      }
                                  }
                            ?>
                        </div>

                        
                            <form action="assets/php/traitement-recuperation.php" method="post">
                                <div class="imputi">
                                    <label for="Pseudo"><p class="texte-pseudo">Pseudo:</p></label>
                                    <input type="text" name="Pseudo" id="Pseudo" required><br>
                                    <label for="mail"><p class="texte-pseudo">Mail:</p></label>
                                    <input type="mail" name="mail" id="mail" required>
                                </div>
                                <div class="validation">
                                    <input class="btn-valide" type="submit" value="Valider">
                                </div>
                            </form>
                        <div class="redirection">
                            <div class="nouveau"><p>vous êtes nouveau?</p><a href="pageinscription.php"> inscrivez-vous ici</a></div>
                        </div>
                    </div>
                </div>
            <div class="bandeau1">
                <div class="copy"></div>
            </div>
        </div>
    </div>
</body>
</html>