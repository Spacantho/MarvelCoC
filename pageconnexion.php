<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <?php
    session_start();
    //  erreur 1 = champs non remplis
    //  erreur 2 = nombre de character trop long
    //  erreur 3 = adresse deja utilisé
    //  erreur 5 = user deja pris
    //  erreur 4 = mdp et mdp 2 non identique
    //  erreur 6 = compte non créer
    //  erreur 7 = password incorrect
    //  erreur 8 = compte non validé


    if (!empty($_GET['erreur'])) {
        $erreur = $_GET['erreur'];
    }
    if (!empty($_GET['success'])) {
        $success = $_GET['success'];
    }
    ?>
    <div class="box-body">
        <div class="mask-body">
            <div class="bandeau"></div>
            <div class="box-titre-image">
                <div class="image-titre"></div>
            </div>
            <div class="box-body-input">
                <div class="box-imput">
                    <div class="titre-page-info">
                        <h2>CONNEXION</h2>
                    </div>
                    <div class="message-php">
                        <?php

                        // Pense a regarder la doc php pour le swich case :) 

                        if (!empty($_GET['erreur'])) {
                            if ($erreur == '1') {
                        ?><p class="color-erreur">veuillez remplir tous les champs</p><?php
                                                                                    }
                                                                                    if ($erreur == '2') {
                                                                                        ?><p class="color-erreur">nombre de character trop long</p><?php
                                                                                                                                                }
                                                                                                                                                if ($erreur == '3') {
                                                                                                                                                    ?><p class="color-erreur">adresse deja utilisé</p><?php
                                                                                                                                                                                                    }
                                                                                                                                                                                                    if ($erreur == '4') {
                                                                                                                                                                                                        ?><p class="color-erreur">mdp et mdp 2 non identique</p><?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    if ($erreur == '5') {
                                                                                                                                                                                                                                                                        ?><p class="color-erreur">utilisateur deja pris</p><?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    if ($erreur == '6') {
                                                                                                                                                                                                                                                            ?><p class="color-erreur">compte non créer</p><?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    if ($erreur == '7') {
                                                                                                                                                                                                                                                ?><p class="color-erreur">mot de passe incorrect</p><?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                    if ($erreur == '8') {
                                                                                                                                                                                                                                                ?><p class="color-erreur">compte non validé</p><?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }

                                                                                                                                                                                                                                                                if (!empty($_GET['success'])) {
                                                                                                                                                                                                                                                                    if ($success == '1') {
                                                                                                                                                                                                                                        ?>
                                <p class="color-success">Compte créer, veuillez verifier votre boite mail.</p>
                        <?php
                                                                                                                                                                                                                                                                    }
                                                                                                                                                                                                                                                                }
                        ?>
                    </div>
                    <form action="assets/php/traitement-connexion.php" method="post">
                        <div class="imputi">
                            <label for="Pseudo">
                                <p class="texte-pseudo">Pseudo:</p>
                            </label>
                            <input type="text" name="Pseudo" id="Pseudo" required><br>
                            <label for="password">
                                <p class="texte-pseudo">Mot de passe:</p>
                            </label>
                            <input type="password" name="password" id="password" required>
                            <div class="recup-mdp"><a href="pagemdplost.php">
                                    <p>Mot de passe oublié</p>
                                </a></div>
                            <div class="recup-mdp1">
                                <p>Se souvenir de moi</p><input type="checkbox" name="isme" id="isme">
                            </div>

                        </div>
                        <div class="validation">
                            <input class="btn-valide" type="submit" name="submitBtnLogin" value="Valider">
                        </div>
                    </form>
                    <div class="redirection">
                        <div class="nouveau">
                            <p>Vous êtes nouveau?</p>
                            <div class="space"></div><a href="pageinscription.php"> Inscrivez-vous ici</a>
                        </div>
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