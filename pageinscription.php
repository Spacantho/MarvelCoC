<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>Page Inscription</title>
</head>

<body>
    <?php
    // erreur 1 = champs non remplis
    //  erreur 2 = nombre de character trop long
    //  erreur 3 = adresse deja utilisé
    //  erreur 5 = user deja pris
    //  erreur 4 = mdp et mdp 2 non identique
    // erreur 6 = compte non créer
    // erreur 7 = password incorrect
    // erreur 8 = compte non validé


    if (!empty($_GET['erreur'])) {
        $erreur = $_GET['erreur'];
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
                        <h2>INSCRIPTION</h2>
                    </div>
                    <div class="message-php">
                        <?php if (!empty($_GET['erreur'])) {
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
                                                                                    ?><p class="color-erreur">user deja pris</p><?php
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
                                                                                    } ?>
                    </div>
                    <form action="assets/php/traitement-inscription.php" method="post">
                        <div class="imputi">
                            <label for="Pseudo">
                                <p class="texte-pseudo">Pseudo:</p>
                            </label>
                            <input type="text" name="Pseudo" id="Pseudo" required><br>
                            <label for="mail">
                                <p class="texte-pseudo">Mail:</p>
                            </label>
                            <input type="email" name="mail" id="mail" required><br>
                            <label for="password">
                                <p class="texte-pseudo">Mot de passe:</p>
                            </label>
                            <input type="password" name="password" id="password" required>
                            <label for="password2">
                                <p class="texte-pseudo">Confirmez mot de passe:</p>
                            </label>
                            <input type="password" name="password2" id="password2" required>
                        </div>
                        <div class="validation">
                            <input class="btn-valide" type="submit" value="Valider">
                        </div>
                    </form>
                    <div class="redirection">
                        <div class="nouveau">
                            <p>Vous êtes déjà inscrit ?</p>
                            <div class="space"></div><a href="pageconnexion.php"> connectez-vous ici</a>
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