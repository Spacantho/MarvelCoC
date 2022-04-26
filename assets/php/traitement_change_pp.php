<?php
require "db.php";

// fonction d'insertion du fichier dans le dossier pp et dans le db
function insertPp($tmpName, $extension, $db, $id) {
    $prefix = "pp_";
    $uniqname = uniqid($prefix , $more_entropy = true).".".$extension;    
    move_uploaded_file($tmpName, '../uploads/pp/'.$uniqname);
    $pdoStat = $db->prepare("UPDATE users SET photo_users = ? WHERE id_users = ?");
    $pdoStat->execute([$uniqname, $id]);
    header("location:../../profil.php?id=$id&mes=validepp");
}

$id = htmlspecialchars($_POST['id']);

// si le fichier existe et n'a pas d'erreur
if (isset($_FILES['file']) && $_FILES['file']['error'] === 0 && isset($id) && !empty($id)){
    $tmpName = $_FILES['file']['tmp_name'];
    $name = $_FILES['file']['name'];
    $size = $_FILES['file']['size'];
    $error = $_FILES['file']['error'];

    $valideExtension = ['jpg', 'jpeg', 'png']; // extensions valides
    $tabExtension = explode('.', $name); //récupération de l'extension du fichier
    $extension = strtolower(end($tabExtension));

    //comparaison de l'extension du fichier avec le tableau d'extensions valides
        if (in_array($extension, $valideExtension)) {
            
           $maxSize = 300000; //taille maximale du fichier, en octets (bytes) 

        // verification de la taille
            if ($size <= $maxSize) {

            //select de la photo du user pour comparaison
                $pdoStat = $db->prepare("SELECT photo_users FROM users WHERE id_users = ?");
                $pdoStat->execute([$id]);
                $data = $pdoStat->fetch(PDO::FETCH_ASSOC);

                //si la photo de profil est celle de base ne pas la supprimé sinon on le supprime
                if ($data == "default-user.png") {
                    inserPp($tmpName, $extension, $db, $id);
                } else {
                    unlink('../uploads/pp/'.$data['photo_users']);
                    insertPp($tmpName, $extension, $db, $id);
                }
                
            //modification du nom du fichier avec un string

            } else {
                header("location:../../profil.php?id=$id&mes=sizepp");
            }
    } else {
        header("location:../../profil.php?id=$id&mes=extend");
    }
} else {
    header("location:../../profil.php?id=$id&mes=misspp");
}

?>