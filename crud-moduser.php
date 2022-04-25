<?php
    session_start();
    if (!isset($_SESSION) || empty($_SESSION) || $_SESSION['sess_id_role'] != 1) {
        header("location:index.php?validate_err");
    }

    require("assets/php/db.php");


    $id_users = $_GET['id'];
    $sqlRequest = "SELECT * FROM users";
    $pdoStat = $db -> prepare($sqlRequest); 
    $pdoStat->execute();
    $id_role = $_GET['role'];
    if(!empty($_GET['erreur'])){
        $erreur = $_GET['erreur'];
       }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/crud-index.css">
    <link rel="stylesheet" href="assets/css/index.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <title>Gestionnaire Administrateur/Modification User</title>
</head>
<body>
<?php require_once "assets/include/navbar.php"; ?>
    <div class="box-body">
        <div class="box-crud-modif">
            <div class="box-body-input">
                <div class="box-imput">
                    <form action="assets/php/traitement-crud-moduser.php?id=<?php echo $id_users?>&role=<?php echo $id_role?>" method="POST" class="crud-create">
                        <?php 
                            while ($result = $pdoStat->fetch()) {
                                if($result['id_users'] == $id_users){
                        ?>
                        <div class="imputi">
                            <label for="username_users"><p class="texte-pseudo">username:</p></label>
                            <input type="texte" name="username_users" id="" value="<?php echo $result["username_users"]?>">
                            <label for="photo_users"><p class="texte-pseudo">photo:</p></label>
                            <input type="texte" name="photo_users" id="" value="<?php echo $result["photo_users"]?>">
                        <?php
                            $sqlRequest = ("SELECT * FROM role");
                            $requetegenre = $db -> prepare($sqlRequest); 
                            $requetegenre->execute();
                            while ($resultgenre = $requetegenre->fetch()) {
                                if($resultgenre['id_role'] == $id_role){
                        ?>
                            <label for="id_role"><p class="texte-pseudo">ID role:</p></label>
                            <select name="id_role" id="user">
                                <option value="<?php echo $resultgenre["id_role"] ?>">--<?php echo $resultgenre["nom_role"] ?>--</option>
                                <?php 
                                    $role = ("SELECT * FROM role");
                                    $role = $db->prepare($role);
                                    $role->execute();
                                    $role = $role ->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($role as $value){ ?>
                                        <option value="<?php echo $value["id_role"] ?>">--<?php echo $value["nom_role"] ?>--</option>
                                <?php } ?>

                            </select>
                        </div>
                        <div class="message-php">
                            <?php 
                                if(!empty($_GET['erreur'])){
                                    if($erreur == '1'){
                                    ?><p class="color-erreur">veuillez remplir tous les champs</p><?php
                                    }
                                    if($erreur == '2'){
                                    ?><p class="color-erreur">nombres de character trop long</p><?php
                                    }
                                }
                            ?>
                        </div>
                        <?php     
                            }}}}
                        ?>
                        <div class="modif-valeur">
                            <input type="submit" name="ajout" value="modifier valeur" id="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="assets/js/navbar.js"></script>
</body>
</html>