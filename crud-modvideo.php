<?php
    // session_start();
    // if(isset($_SESSION['sess_user_id'])){
    //     if(isset($_SESSION['sess_id_role'])){
    //         if($_SESSION['sess_id_role'] == "1"){
    //             if(isset($_GET['id'])){
                    $id_video = $_GET['id'];
                    $role = $_GET['role'];
                    require("assets/php/db.php");
                    $sqlRequest = "SELECT * FROM video
                                    INNER JOIN users ON users.id_users = video.id_users
                                    INNER JOIN categorie ON categorie.id_categorie = video.id_categorie
                                                    ";
                    $pdoStat = $db -> prepare($sqlRequest); 
                    $pdoStat->execute();
            
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
    <title>modding</title>
</head>
<body>
<?php require_once "assets/include/navbar.php"; ?>
    <div class="box-body">
        <div class="box-crud-modif">
            <div class="box-body-input">
                <div class="box-imput">
                    <form action="assets/php/traitement-crud-moduser.php?id=<?php echo $id_video?>" method="POST" class="crud-create">
                        <?php 
                            while ($result = $pdoStat->fetch()) {
                                if($result['id_video'] == $id_video){
                        ?>
                            <div class="imputi">
                            <label for="titre_video"><p class="texte-pseudo">Titre:</p></label>
                            <input type="texte" name="titre_video" id="" value="<?php echo $result["titre_video"]?>">
                            <label for="description_video"><p class="texte-pseudo">Description:</p></label>
                            <input type="texte" name="description_video" id="" value="<?php echo $result["description_video"]?>">
                            <label for="miniature_video"><p class="texte-pseudo">Miniature:</p></label>
                            <input type="texte" name="miniature_video" id="" value="<?php echo $result["miniature_video"]?>">
                            <label for="lien_video"><p class="texte-pseudo">lien:</p></label>
                            <input type="texte" name="lien_video" id="" value="<?php echo $result["lien_video"]?>">
                        <?php
                            $id_role = $_GET['role'];

                            // $sqlRequest = ("SELECT * FROM categorie");
                            // $requetegenre = $db -> prepare($sqlRequest); 
                            // $requetegenre->execute();
                            // while ($resultgenre = $requetegenre->fetch()) {
                                if($result['id_categorie'] == $role){
                        ?>
                            <label for="id_role"><p class="texte-pseudo">ID role:</p></label>
                            <select name="id_role" id="user">
                                <option value="<?php echo $result["id_categorie"] ?>">--<?php echo $result["nom_categorie"] ?>--</option>
                                <?php 
                                    $role = ("SELECT * FROM categorie");
                                    $role = $db->prepare($role);
                                    $role->execute();
                                    $role = $role ->fetchAll(PDO::FETCH_ASSOC);
                                        foreach ($role as $value){ ?>
                                        <option value="<?php echo $value["id_categorie"] ?>">--<?php echo $value["nom_categorie"] ?>--</option>
                                <?php } ?>

                            </select>
                        </div>
                        
                        <?php     
                                    }
                                }
                            // }
                        }
                        ?>
                        <div class="modif-valeur2">
                            <input type="submit" name="ajout" value="modifier valeur" id="submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php       
//     }}
//     else{
//         session_destroy();
//         header("Location: assets/php/signup.php");
//     }
//     }}
//     else{
//         header("Location: assets/php/signup.php");
//     }
?>