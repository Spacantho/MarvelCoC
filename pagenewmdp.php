<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>page-reset-mdp</title>
</head>
<body>
    <?php
        if(!empty($_GET['erreur'])){
            $erreur = $_GET['erreur'];}
    ?>
    <div class="box-body">
        <div class="mask-body">
            <div class="bandeau"></div>
                <div class="box-titre-image">
                    <div class="image-titre"></div>
                </div>
                <div class="box-body-input">
                    <div class="box-imput">
                        <div class="titre-page-info"><h2>PASSWORD PERDU</h2></div>
                        <div class="message-php">
                            <?php if(!empty($_GET['erreur'])){
                                      if($erreur == '1'){
                            ?>         <p class="color-erreur">champ non remplis</p>
                            <?php    
                                      }
                                      if($erreur == '2'){
                            ?>         <p class="color-erreur">mot de passe trop long</p>
                            <?php
                                  }}
                            ?>
                        </div>

                        
                            <form action="assets/php/traitement-New-mdp.php?token=<?php echo $_GET['token']?>" method="post">
                                <div class="imputi">
                                    <label for="New-mdp"><p class="texte-pseudo">Nouveau Mot de passe:</p></label>
                                    <input type="password" name="New-mdp" id="New-mdp" required><br>
                                    <label for="RNew-mdp"><p class="texte-pseudo">repetez Mot de passe:</p></label>
                                    <input type="password" name="RNew-mdp" id="RNew-mdp" required>
                                </div>
                                <div class="validation">
                                    <input class="btn-valide" type="submit" value="Valider">
                                </div>
                            </form>
                    </div>
                </div>
            <div class="bandeau1">
                <div class="copy"></div>
            </div>
        </div>
    </div>
</body>
</html>