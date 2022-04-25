<?php

session_start();

require "assets/php/getprofilinfo.php";

if (!isset($_SESSION) || empty($_SESSION) || !$mine) {
    header("location:index.php?validate_err");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/profil.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <script src="https://kit.fontawesome.com/31b5087217.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <title>Profil</title>
</head>

<body>
    <?php require_once "assets/include/navbar.php"; ?>

    <div id="message">
        <?php //gestion erreur
            
            if (isset($_GET['mes']) && !empty($_GET['mes'])) {

                $message = $_GET['mes'];
                    switch ($message) {
                        case "missing_input":
                            echo "<span class='erreur'>Veuillez remplir tous les champs.</span>";
                            break;
                        case "mdplength":
                            echo "<span class='erreur'>Mot de passe trop long. (max: 255)</span>";
                            break;
                        case "samepw":
                            echo "<span class='erreur'>Vérifiez que les deux mots de passe correspondent.</span>";
                            break;
                        case "olderr":
                            echo "<span class='erreur'>L’ancien mot de passe saisi est incorrect.</span>";
                            break;
                        /* case "succes_pseudo":
                            echo "<span class='succes'>Votre pseudonyme à bien été modifié.</span>";
                            break; */
                    }
            }
        
        ?>
    </div>

        <div id="corps_mdp">
            <div id="formulaire_mdp">
                <form action="assets/php/traitement_change_mdp.php" method="post">
                    <input type="hidden" name="id_user" value="<?php echo $id_user ?>">
                    <label for="old_password">Mot de passe actuel</label>
                    <input type="password" name="old_password" id="old_password" maxlength="255" autofocus required>
                    <label for="first_password">Nouveau mot de passe</label>
                    <input type="password" name="first_password" id="first_password" maxlength="255" required>
                    <label for="second_password">Confirmer le nouveau mot de passe</label>
                    <input type="password" name="second_password" id="second_password" maxlength="255" required>
                    <button type="submit" id="valide_btn">Valider</button>
                </form>
            </div>
        </div>

    <script src="assets/js/edit_pseudo_user.js"></script>
    <script src="assets/js/navbar.js"></script>
</body>

</html>