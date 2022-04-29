<?php







session_start();
// if (!isset($_SESSION) || empty($_SESSION)) {
//     header("location:index.php?validate_err");
// }

require "assets/php/getallcategorie.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/categories.css">
    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <title>Catégories</title>
</head>

<body>
    <?php require_once "assets/include/navbar.php"; ?>

    <section class="categorieContainer">
        <div class="categories">
            <?php foreach ($result as $value) { ?>
                <a href="<?php echo "templateCategorie.php?categorie=" . $value["id_categorie"] ?>">
                    <div class="categorie" style="background-image: url('<?php echo "assets/uploads/" . $value["img_categorie"] ?>');background-size: cover;background-position: center;">
                        <div class=" filterBlack">
                            <div class="titleCat"><?php echo "Categorie " . $value["nom_categorie"]; ?></div>
                            <div class="textCat">
                                <div> <?php echo showNbVid($db, $value["id_categorie"]); ?></div>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>
    </section>
    <?php require_once "assets/include/footer.php"; ?>

    <script src="assets/js/navbar.js"></script>
</body>

</html>