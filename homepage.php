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
    <link rel="stylesheet" href="assets/css/homepage.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Home</title>
</head>

<body>

    <?php require_once "assets/include/footer.php"; ?>

        <div id="corps">



        </div>

    <?php require_once "assets/include/navbar.php"; ?>

    <script src="assets/js/navbar.js"></script>
</body>

</html>