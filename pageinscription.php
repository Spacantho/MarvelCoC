<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>Inscription</title>
</head>
<body>
    <?php 
    if(!empty($_GET['erreur'])){$erreur = $_GET['erreur'];}
    ?>
    <div class="box-body">
        <div class="mask-body">
            <div class="bandeau"></div>
                <div class="box-titre-image">
                    <div class="image-titre"></div>
                </div>
                <div class="box-body-input">
                    <div class="box-imput">
                        <div class="titre-page-info"><h2>INSCRIPTION</h2></div>
                        <div class="message-php">
                            <?php if(!empty($_GET['erreur'])){
                                  if($erreur == '4'){
                            ?><p class="color-erreur">veuillez respecter tous les champs</p><?php
                                    // echo ('veuillez respecter tous les champs');
                            } }?>
                        </div>
                            <form action="assets/php/traitement-inscription.php" method="post">
                                <div class="imputi">
                                    <label for="Pseudo"><p class="texte-pseudo">Pseudo:</p></label>
                                    <input type="text" name="Pseudo" id="Pseudo" required><br>
                                    <label for="mail"><p class="texte-pseudo">Mail:</p></label>
                                    <input type="email" name="mail" id="mail" required><br>
                                    <label for="password"><p class="texte-pseudo">Mot de passe:</p></label>
                                    <input type="password" name="password" id="password" required>
                                    <label for="password2"><p class="texte-pseudo">Confirmez mot de passe:</p></label>
                                    <input type="password" name="password2" id="password2" required>
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

