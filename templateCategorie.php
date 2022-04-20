<?php require "assets/php/getallvid.php"; 

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
    <link rel="stylesheet" href="assets/css/categorie.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Catégorie</title>
</head>

<body>
    <?php require_once "assets/include/navbar.php"; ?>
    <section class="categorieContainer">
        <div class="categories">
            <?php foreach ($videos as $video) { ?>
                <a href=<?php echo "template_video.php?video=" . $video["id_video"] ?>>
                    <div class="categorie" style="background-image: url(<?php echo $video["miniature_video"] ?>);background-size: cover;">

                        <div class="filterBlack">
                            <div class="titleCat"><?php echo $video["titre_video"] ?></div>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
    </section>
    <?php require_once "assets/include/footer.php"; ?>
</body>

</html>