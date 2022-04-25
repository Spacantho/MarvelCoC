<?php

session_start();
if (!isset($_SESSION) || empty($_SESSION)) {
    header("location:index.php?validate_err");
}
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
    <div class="box-nos-films">
        <div class="sliders onback">
            <div class="sous-titre"><h3>Nos dernieres videos</h3></div>
            <div class="slide responsive onrad">
                <div class="body-slide" id="">
                    <div class="card" style=" background: url(assets/images/fake.png)">
                        <a href="" class="js-modal">                           
                            <div class="textcache" id="info">
                                <div class="minititre">
                                    <h4>Info</h4>
                                    <ul>
                                        <li><p>test</p></li>
                                        <li><p>test</p></li>
                                        <li><p>test</p></li>
                                    </ul>
                                </div>
                            </div>
                            test
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="sliders onback">
            <div class="sous-titre"><h3>Videos les plus aimer</h3></div>
            <div class="slide responsive onrad">
                <div class="body-slide" id="">
                    <div class="card" style=" background: url(assets/images/fake.png)">
                        <a href="" class="js-modal">                           
                            <div class="textcache" id="info">
                                <div class="minititre">
                                    <h4>Info</h4>
                                    <ul>
                                        <li><p>test</p></li>
                                        <li><p>test</p></li>
                                        <li><p>test</p></li>
                                    </ul>
                                </div>
                            </div>
                            test
                        </a>
                    </div>
                </div> 
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