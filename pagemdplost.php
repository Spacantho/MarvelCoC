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

                    <div class="box-imput">
                        <h2 class="titre-page-info">Mot de passe oublié</h2>
                        <div class="message-php">
                            <?php
                            //Check Way : pagemdplost.php? + message
                            if (isset($_GET['mes']) && !empty($_GET['mes'])) {
                                $message = $_GET['mes'];
                                    switch ($message) {
                                        case "mailsend":
                                            echo "<span class='color-success'>Un email vous a bien été envoyé</span>";
                                            break;
                                        case "noaccount":
                                            echo "<span class='color-erreur'>Ce compte n'existe pas</span>";
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
                            <form action="assets/php/traitement-recuperation.php" method="post">
                                <div class="imputi">
                                    <label for="Pseudo"><p class="texte-pseudo">Pseudo:</p></label>
                                    <input type="text" name="Pseudo" id="Pseudo" maxlength="30" required><br>
                                    <label for="mail"><p class="texte-pseudo">Mail:</p></label>
                                    <input type="mail" name="mail" id="mail" maxlength="320" required>
                                </div>
                                <div class="validation">
                                    <input class="btn-valide" type="submit" value="Valider">
                                </div>
                                <div class="redirection">
                                    <div class="nouveau"><p>Vous êtes nouveau ?</p><a href="pageinscription.php" style="margin-left: 5px;">Inscrivez-vous ici</a></div>
                                </div>
                            </form>
</body>
</html>