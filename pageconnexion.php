<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>Page de Connexion</title>
</head>

<body>
    <?php
    session_start();
    if (isset($_COOKIE["remember"])) {
        header("Location: assets/php/traitement-connexion.php");
    }
    ?>

                <div class="box-imput">

                    <h2 class="titre-page-info">Connexion</h2>

                    <div class="message-php">

                    <?php
                    //Check Way : pageconnexion.php? + message
                    if (isset($_GET['mes']) && !empty($_GET['mes'])) {
                        $message = $_GET['mes'];
                            switch ($message) {
                                case "regok":
                                    echo "<span class='color-success'>Compte créé, veuillez consulter votre boîte mail pour activer le compte.</span>";
                                    break;
                                case "valid":
                                    echo "<span class='color-success'>Votre compte a bien été vérifié</span>";
                                    break;
                                case "noaccount":
                                    echo "<span class='color-erreur'>Ce compte n'existe pas</span>";
                                    break;
                                case "pwfail":
                                    echo "<span class='color-erreur'>Votre mot de passe est incorrect</span>";
                                    break;
                                case "novalid":
                                    echo "<span class='color-erreur'>Votre compte n'est pas activé, consultez vos mails</span>";
                                    break;
                                case "pwchange":
                                    echo "<span class='color-success'>Votre mot de passe à bien été modifié</span>";
                                    break;
                                case "missinput":
                                    echo "<span class='color-erreur'>Veuillez remplir tous les champs</span>";
                                    break;
                                case "token_missed":
                                    echo "<span class='color-erreur'>Erreur mail</span>";
                                    break;
                                case "token_failed":
                                    echo "<span class='color-erreur'>Erreur d'authentification</span>";
                                    break;
                            }
                    }?>
                    </div>

                    <form action="assets/php/traitement-connexion.php" method="post">
                        <div class="imputi">
                            <label for="Pseudo">
                                <p class="texte-pseudo">Pseudo:</p>
                            </label>
                            <input type="text" name="Pseudo" id="Pseudo" maxlength=30 required><br>
                            <label for="password">
                                <p class="texte-pseudo">Mot de passe:</p>
                            </label>
                            <input type="password" name="password" id="password" maxlength=30 required>
                            <div class="recup-mdp"><a href="pagemdplost.php">
                                    <p>Mot de passe oublié</p>
                                </a></div>
                            <div class="recup-mdp1">
                                <label for="isme">Se souvenir de moi</label><input type="checkbox" name="isme" id="isme">
                            </div>

                        </div>

                        <div class="validation">
                            <input class="btn-valide" type="submit" name="submitBtnLogin" value="Valider">
                        </div>
                    <div class="redirection">
                        <div class="nouveau">
                            <p>Vous êtes nouveau?</p>
                            <div class="space"></div><a href="pageinscription.php"> Inscrivez-vous ici</a>
                        </div>
                    </div>
                    </form>
                </div>
</body>

</html>