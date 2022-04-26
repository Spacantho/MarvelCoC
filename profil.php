<?php
session_start();
setlocale(LC_TIME, "fr_FR");

require "assets/php/getprofilinfo.php";

if (!isset($_SESSION) || empty($_SESSION) && !isset($_GET["id"]) || empty($_GET["id"])) {
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
                        case "err_pseudo":
                            echo "<span class='erreur'>Ce pseudonyme est déjà utilisé.</span>";
                            break;
                        case "maxlength":
                            echo "<span class='erreur'>Le pseudonyme est trop long (max: 20)</span>";
                            break;
                        case "misspp":
                            echo "<span class='erreur'>Veuillez inserer une image.</span>";
                            break;
                        case "extend":
                            echo "<span class='erreur'>L'extension du fichier n'est pas prise en charge.</span>";
                            break;
                        case "sizepp":
                            echo "<span class='erreur'>Le fichier est trop lourd.</span>";
                            break;
                        case "succes_pseudo":
                            echo "<span class='succes'>Votre pseudonyme à bien été modifié.</span>";
                            break;
                        case "pwchangeok":
                            echo "<span class='succes'>Votre mot de passe à bien été modifié.</span>";
                            break;
                        case "validepp":
                            echo "<span class='succes'>Votre photo de profil à bien été modifié.</span>";
                            break;
                    }
            }
        
        ?>
    </div>

    <div id="corps">
        <div id="photo_profil">
            <div id="pp" style="background: url(assets/uploads/pp/<?php echo $result["photo_users"]?>) center no-repeat; background-size: cover;"></div>
            <?php if ($mine) { ?>
                <div onclick="changePp(<?php echo $id_user; ?>)" id="edit_pp">Éditer la photo.</div>
            <?php } ?>
        </div>
        <div id="profil_info">
            <p id="membre-depuis">Membre depuis le <?php echo strftime("%d %B %G", strtotime($result['date_users']))?></p>
            <div id="username">
                <p class="label">Pseudo :</p> 
                <p id="username_input"> 
                    <?php echo $result["username_users"];?>
                    
                <?php /* si la page de profil est la mienne */
                    if ($mine) { ?>
                        <a onclick="editPseudo('<?php echo $result['username_users']; ?>','<?php echo $id_user ?>')" class="editPseudo"><i class="fa-solid fa-pen"></i></a>
                    <?php } ?>
                </p>
            </div>

            <?php if($mine) {?>
                
                <div id="email">
                    <p>E-mail : <?php echo $result["mail_users"].'<br/>';?>
                    <span>L'email ne peut pas être modifié.</span></p>
                </div>
                
                <div id="mdp">
                    <a href="change_mdp.php?id=<?php echo $id_user?>">Modifier le mot de passe.</a>
                </div> 
                
            <?php } ?>
        </div>
    </div>


    <script src="assets/js/edit_pseudo_user.js"></script>
    <script src="assets/js/changePp.js"></script>
    <script src="assets/js/navbar.js"></script>
</body>

</html>