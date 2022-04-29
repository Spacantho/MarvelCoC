<?php
require ("assets/php/db.php");

//s'il existe le token et l'id en get
if (isset($_GET["t"]) && !empty($_GET['t']) && isset($_GET["i"]) && !empty($_GET['i'])) {

    $id = htmlspecialchars($_GET['i']);
    $getToken = htmlspecialchars($_GET['t']);

    // returne true si le token est bien associé au user
    $pdoStat = $db->prepare("SELECT token from users where id_users = ?");
    $pdoStat->execute([$id]);
    $data = $pdoStat->fetch(PDO::FETCH_ASSOC);
    $token = $data['token'];

    // on compare le token du get et celui du user et on renvoi à l'index si ce n'est pas bon
    if ($getToken != $token) {
        header("Location: index.php");
    }
} else {
    header("Location: index.php");
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/connexion.css">
    <title>Page reset mot de passe</title>
</head>
<body>
                    <div class="box-imput">
                        <h2 class="titre-page-info">Réinitialisation du mot de passe</h2>
                        <div class="message-php">
                            <?php if (isset($_GET['mes']) && !empty($_GET['mes'])) {
                                $message = $_GET['mes'];
                                    switch ($message) {
                                        case "samepw":
                                            echo "<span class='color-erreur'>Vérifiez que les deux mots de passe correspondent.</span>";
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
                        <form action="assets/php/traitement-New-mdp.php?t=<?php echo $token; ?>&i=<?php echo $id;?>" method="post">
                            <div class="imputi">
                                <label for="New-mdp"><p class="texte-pseudo">Nouveau mot de passe</p></label>
                                <input type="password" name="New-mdp" id="New-mdp" maxlength=255 required><br>
                                <label for="RNew-mdp"><p class="texte-pseudo">Confirmez le mot de passe</p></label>
                                <input type="password" name="RNew-mdp" id="RNew-mdp" maxlength=255 required>
                            </div>
                            <div class="validation">
                                <input class="btn-valide" type="submit" value="Valider">
                            </div>
                        </form>
                    </div>
                
</body>
</html>