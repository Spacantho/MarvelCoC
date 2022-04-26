<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>
    <link rel="stylesheet" href="assets/css/stylecontact.css">
  <link href="assets/css/navbar.css" rel="stylesheet">
</head>
<body>
 
<?php include 'assets/include/navbar.php';

if (isset($_POST['contact']))

?>

<div class="bodycontainer">
    <h1>Nous contacter</h1>
    <form id="form">
        <div>
        <img src="https://cdn4.iconfinder.com/data/icons/basic-user-interface-elements/700/mail-letter-offer-256.png" alt="icon">
        </div>
        <input id="nom" type="text" placeholder="Nom" required>
        <input id="mail" type="text" placeholder="Votre email" required>
        <input id="obj" type="text" placeholder="Objet" required>
        <textarea id="msg" placeholder="Message" required></textarea>
        <input id ="btn_envoyer" type="submit" value="Envoyer">
    </form>
<div id="load2"></div>
</div>

<div class="result">

</div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="assets/js/navbar.js"></script>

    <script>
        $("#form").submit(function(e) {
            var nom = document.getElementById("nom").value
            var to = "marvelcoc@gmail.com"
            var object = document.getElementById("obj").value
            var message = document.getElementById("msg").value
            var sender_mail = document.getElementById("mail").value
            document.getElementById("form").style.opacity = "0"
            document.getElementById("load2").style.display = "block"
            e.preventDefault();
            $.post( "assets/php/mailcontacttraitement.php", {
                nom: nom,
                to: to,
                object: object,
                message: message,
                sender_mail: sender_mail
            }, function( data ) {
            $(".result").html( data );
            document.getElementById("form").style.opacity = "1"
            document.getElementById("load2").style.display = "none"
            })
        });
    </script>

</body>
</html>