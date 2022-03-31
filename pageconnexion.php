<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/styles.css">
    <title>Connexion</title>
</head>
<body>
    <div class="box-body">
        <div class="mask-body">
            <div class="bandeau"></div>
                <div class="box-titre-image">
                    <div class="image-titre"></div>
                </div>
                <div class="box-body-input">
                    <div class="box-imput">
                        <div class="titre-page-info"><h2>CONNEXION</h2></div>
                        <div class="message-php"><p></p></div>
                            <form action="" method="post">
                                <div class="imputi">
                                    <label for="Pseudo"><p class="texte-pseudo">Pseudo:</p></label>
                                    <input type="text" name="Pseudo" id="Pseudo" required><br>
                                    <label for="password"><p class="texte-pseudo">Mot de passe:</p></label>
                                    <input type="password" name="password" id="password" required>
                                    <div class="recup-mdp"><a href="pagemdplost.php"><p>Mot de passe oublié</p></a></div> 
                                    <div class="recup-mdp1">
                                        <p>Se souvenir de moi</p><input type="checkbox" name="isme" id="isme">
                                    </div> 

                                </div>
                                <div class="validation">
                                    <input class="btn-valide" type="submit" value="Valider">
                                </div>
                            </form>
                        <div class="redirection">
                            <div class="nouveau"><p>Vous êtes nouveau?</p><div class="space"></div><a href="pageinscription.php"> Inscrivez-vous ici</a></div>
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

