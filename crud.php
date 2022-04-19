<?php
    // session_start();
    // if(isset($_SESSION['sess_user_id'])){
    //     if(isset($_SESSION['sess_id_role'])){
    //         if($_SESSION['sess_id_role'] == "1"){
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/crud-index.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <title>Crud</title>
</head>
<body>
<?php
    // success 1 = modification reussi


    if(!empty($_GET['success'])){$success = $_GET['success'];}
    ?>
    <?php require_once "assets/include/navbar.php"; ?>
    <div class="box-body">
        <div class="box-crud">
            <div class="crud-column">
                <a class='crud-icone' href="crud-video.php"><img class='crud-icone' src="assets/images/svg/video-solid.svg"></a><p class='texte-crud'>VIDEOS</p>
            </div>
            <img class='crud-slash' src="assets/images/slash.png">
            <div class="crud-column">
                <a class='crud-icone' href="crud-user.php"><img class='crud-icone' src="assets/images/svg/user-solid.svg"></a><p class='texte-crud'>USERS</p>
            </div>
            <img class='crud-slash' src="assets/images/slash.png">
            <div class="crud-column">
                <a class='crud-icone' href="crud-comm.php"><img class='crud-icone' src="assets/images/svg/comments-solid.svg"></a><p class='texte-crud'>COMMENTAIRES</p>
            </div>
        </div>
        <div class="message-php">
        <?php if(!empty($_GET['success']))
        {
                if($success == '1')  {
                ?><p class="color-success">modification reussi</p><?php
                                                        }
        }?>
        </div>
    </div>
</body>
</html>
<?php 
    //     }
    // else{session_destroy();
    //      header("Location: index.php");}

    // }}
    // else{header("Location: index.php");}
?>