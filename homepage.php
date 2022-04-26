<?php

session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("location:index.php?validate_err");
}
include "assets/php/accesvideo.php";
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/homepage.css"/>
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="assets/css/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css"/>
    <title>Home</title>
</head>
<body>
    <?php require_once "assets/include/navbar.php"; ?>
    <div class="box-bienvenue">
        <div class="bienvenue">
            <p class='texte-de-bienvenue'>
            Bienvenue, <strong style="color: rgb(106, 164, 168);"><?php echo $_SESSION['sess_user_name']?></strong> Lorem ipsum dolor sit amet consectetur, adipisicing elit. Autem ipsum animi possimus eius ipsam optio, temporibus aut facilis, natus fugiat dicta! Quis animi, assumenda ex nostrum distinctio similique expedita fuga!
            Sed repellendus quisquam saepe temporibus sequi nemo. Maiores soluta distinctio dolor quod praesentium vero placeat numquam rem ratione cumque voluptatum officiis neque totam, nobis provident dignissimos sapiente, sunt accusantium laborum.
            Ipsam officia doloremque reprehenderit ea exercitationem explicabo natus tempora rerum facilis eos blanditiis non, officiis harum ullam. Aperiam, alias impedit neque numquam velit sapiente est quaerat expedita. Magni, fugit repellat?
            <p>
        </div>
    </div>
    <div class="box-nos-films">
        <div class="sliders onback">
            <div class="sous-titre"><h3>Nos dernieres videos</h3></div>
            <div class="slide responsive onrad">
            <?php foreach ($executevideo as $value){ ?>
                <div class="body-slide" id="">
                    <div class="card" style=" background: center / contain no-repeat url(<?php echo $value['miniature_video']?>)">
                        <a href="template_video.php?video=<?php echo $value["id_video"]?>" class="js-modal">                           
                            <div class="textcache" id="info">
                                <p>
                                    <?php 
                                        echo substr($value["description_video"], 0, 100);
                                        if(strlen($value['description_video'])>= 100)
                                        {echo $threepoint;}
                                    ?>
                                </p>
                            </div>
                            <?php echo $value["titre_video"]?>
                        </a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div> 
    </div>
    <?php require_once "assets/include/footer.php"; ?>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="assets/js/navbar.js"></script>
    <script src="assets/js/slider.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.min.js"></script>
    <script type="text/javascript" src="assets/js/slick.js"></script>
</body>
</html>