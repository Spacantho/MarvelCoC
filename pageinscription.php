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
                <div class="box-imput">
                        <h2 class="titre-page-info">Inscription</h2>
                    <div class="message-php">

                    <?php
                    //Check Way : pageinscription.php? + message
                    if (isset($_GET['mes']) && !empty($_GET['mes'])) {
                        $message = $_GET['mes'];
                            switch ($message) {
                                case "equalpw":
                                    echo "<span class='color-erreur'>Les mots de passes ne correspondent pas</span>";
                                    break;
                                case "urfail":
                                    echo "<span class='color-erreur'>Ce pseudonyme est déjà utilisé</span>";
                                    break;
                                case "mailfail":
                                    echo "<span class='color-erreur'>Cet email est déjà associé à un compte</span>";
                                    break;
                                case "missinput":
                                    echo "<span class='color-erreur'>Veuillez remplir tous les champs</span>";
                                    break;
                                case "length":
                                    echo "<span class='color-erreur'>Un des champs est trop long</span>";
                                    break;
                            }
                    }?>
                    </div>
                    <form action="assets/php/traitement-inscription.php" method="post">
                        <div class="imputi">
                            <label for="Pseudo">
                                <p class="texte-pseudo">Pseudo:</p>
                            </label>
                            <input type="text" name="Pseudo" id="Pseudo3" maxlength=30 required><br>
                            <label for="mail">
                                <p class="texte-pseudo">Mail:</p>
                            </label>
                            <input type="email" name="mail" id="mail3" maxlength=320 required><br>
                            <label for="password">
                                <p class="texte-pseudo">Mot de passe:</p>
                            </label>
                            <input type="password" name="password" id="password3" maxlength=255 required>
                            <label for="password2">
                                <p class="texte-pseudo">Confirmez le mot de passe:</p>
                            </label>
                            <input type="password" name="password2" id="password4" maxlength=255 required>
                        </div>
                        <div class="validation">
                            <input class="btn-valide" type="submit" value="Valider">
                        </div>
                    <div class="redirection">
                        <div class="nouveau">
                            <p>Vous êtes déjà inscrit ?</p>
                            <div class="space"></div><a href="pageconnexion.php"> Connectez-vous ici</a>
                        </div>
                    </div>
                    </form>
                </div>
    </div>
</body>

</html>