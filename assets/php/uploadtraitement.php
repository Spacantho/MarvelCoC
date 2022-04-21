<?php

if (isset($_POST['videoname']) && isset($_POST['videodesc'])) {

  $video_was_added_in_bdd = false;
  $video_inserted_in_bdd_ID = -1;
  $categorie_was_added_in_bdd = false;
  $categorie_inserted_in_bdd_ID = -1;
  $fichiers_ajoutes_au_serveurs_names = array();

  $willCancel = false;

  $title = $_POST['videoname'];
  $lienyoutube = $_POST['videolink'];
  $desc = $_POST['videodesc'];
  $isNewCategorie = $_POST['isNewCategorie'];

  // //echo("Titre: <br>");
  // echo($title);

  if (strlen($title) == 0) {
    $willCancel = true;
    echo ("<div class='badmsg'>Le titre est vide</div>");
  }

  if (strlen($desc) == 0) {
    $desc = true;
    echo ("<div class='badmsg'>La description est vide</div>");
  }

  $switchVideoType = "file";
  if (isset($_POST['switchinput'])) {
    $switchVideoType = "link";
    if (strlen($lienyoutube) == 0) {
      $willCancel = true;
      echo ("<div class='badmsg'>Le lien est vide</div>");
    }
  }

  // echo("Videotype: ");
  // echo($switchVideoType);
  // echo("<br>");

  // echo("Categorie sélectionée: ");
  // echo($_POST['selectcategorie']);


  // echo("Nouvelle categorie ? ");
  // echo($isNewCategorie);
  // echo("<br>");

  // if ($isNewCategorie=="false"){
  //   echo("Categorie ID: ");
  //   echo($_POST['selectedCategorieID']);
  //   echo("<br>");
  // }

  // echo("Lien: ");
  // echo($lienyoutube);
  // echo("<br>");

  // echo("Desc: ");
  // echo($desc);
  // echo("<br>");
  // echo("<br>");

  switch ($switchVideoType) {
    case "file":
      //   echo "La vidéo est un fichier<br>";
      $videoPath = upload("videofile", "mp4", $video_was_added_in_bdd, $video_inserted_in_bdd_ID, $categorie_was_added_in_bdd, $categorie_inserted_in_bdd_ID, $fichiers_ajoutes_au_serveurs_names, $willCancel, "la vidéo");
      break;
    case "link":
      //   echo "La vidéo est un lien<br>";
      $videoPath = $lienyoutube;
      break;
    default:
      //   echo "Type de video indeterminé";
      break;
  }

  $imagePath = upload("miniature", "png", $video_was_added_in_bdd, $video_inserted_in_bdd_ID, $categorie_was_added_in_bdd, $categorie_inserted_in_bdd_ID, $fichiers_ajoutes_au_serveurs_names, $willCancel, "la miniature");

  include 'db.php';

  if ($isNewCategorie == "true") {

    $categorie_img = "default";
    $categorie_img = upload("uploadimagecategorie", "png", $video_was_added_in_bdd, $video_inserted_in_bdd_ID, $categorie_was_added_in_bdd, $categorie_inserted_in_bdd_ID, $fichiers_ajoutes_au_serveurs_names, $willCancel, "l'image de la catégorie");

    $sql = "INSERT INTO categorie (nom_categorie, img_categorie) VALUES (?, ?)";
    $stmt = $db->prepare($sql);

    $id_categorie = "null";

    if (strlen($_POST['newcategoriename']) > 0) {
      //INSERT CATÉGORIE
      $stmt->execute([$_POST['newcategoriename'], $categorie_img]);
      $categorie_was_added_in_bdd = true;
      $categorie_inserted_in_bdd_ID = $db->lastInsertId();
      $id_categorie = $db->lastInsertId();
    } else {
      echo "<div class='badmsg'>Le nom de la nouvelle catégorie est vide</div>";
      $willCancel = true;
    }

    //  echo("Nouvelle catégorie ajoutée :".$_POST['newcategoriename']." id: ".$id_categorie." img: ".$categorie_img." <br>");
  } else {
    $id_categorie = $_POST['selectedCategorieID'];
  }
  //MODIFICATION BDD ICI POUR SERIALIZER
  require("video.php");
  $newVid = new Video(0);
  // On serialize l'objet vidéo
  $serialized = serialize($newVid);




  if ($id_categorie != "null") {
    $sql = "INSERT INTO video (titre_video, description_video, miniature_video, date_video, lien_video, typelien_video, valide, id_users, id_categorie, view) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $db->prepare($sql);
    /****************/
    //INSERT VIDEO
    $stmt->execute([$title, $desc, $imagePath, date('Y-m-d H:i:s'), $videoPath, "uploaded", 0, 1, $id_categorie, $serialized]);
    $video_was_added_in_bdd = true;
    $video_inserted_in_bdd_ID = $db->lastInsertId();
  } else {
    $willCancel = true;
  }

  if ($willCancel) {
    cancel_upload($video_was_added_in_bdd, $video_inserted_in_bdd_ID, $categorie_was_added_in_bdd, $categorie_inserted_in_bdd_ID, $fichiers_ajoutes_au_serveurs_names, $willCancel);
  } else {
    if ($categorie_was_added_in_bdd) {
      echo "<div class='goodmsg'>Catégorie Ajoutée</div>";
    }
    echo "<div class='goodmsg'>Vidéo Ajoutée</div>";
  }
} else {
  echo "<div class='badmsg'>Champs manquants</div>";
}


function upload($path, $fileTypeExpected, $video_was_added_in_bdd, $video_inserted_in_bdd_ID, $categorie_was_added_in_bdd, $categorie_inserted_in_bdd_ID, &$fichiers_ajoutes_au_serveurs_names, &$willCancel, $string)
{

  $nomFinalDuFichier = "";

  $target_dir = "../uploads/";

  $f_name = $_FILES[$path]["name"];
  $t_name = $_FILES[$path]["tmp_name"];
  $randomString = generateRandomString();

  $fupload = move_uploaded_file($t_name, $target_dir . $randomString . $f_name);


  $target_file = $target_dir . basename($_FILES[$path]["name"]);
  $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  if ($fileType == $fileTypeExpected) {
    if ($fupload) {
      //echo $fileType." uploaded<br>";
      $nomFinalDuFichier = $randomString . $f_name;
      array_push($fichiers_ajoutes_au_serveurs_names, $nomFinalDuFichier);
    } else {
      echo "<div class='badmsg'>Impossible d'upload " . $string . "</div>";
      $willCancel = true;
    }
  } else {
    echo "<div class='badmsg'>Impossible d'upload " . $string . ", le format n'est pas le bon ou le fichier est inexistant</div>";
    $willCancel = true;
  }

  return $nomFinalDuFichier;
}

function generateRandomString($length = 20)
{
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

function cancel_upload($video_was_added_in_bdd, $video_inserted_in_bdd_ID, $categorie_was_added_in_bdd, $categorie_inserted_in_bdd_ID, $fichiers_ajoutes_au_serveurs_names)
{

  echo "<br><div class='badmsg'>Veuillez ressayer</div>";

  include 'db.php';

  if ($video_was_added_in_bdd) {
    $sql = "DELETE FROM video WHERE id_video=$video_inserted_in_bdd_ID";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    // echo "<br>la video a bien été annulée";
  } else {
    // echo "<br>La vidéo ne doit pas être annulée car elle n'est pas dans la bdd</br>";
  }

  if ($categorie_was_added_in_bdd) {
    $sql = "DELETE FROM categorie WHERE id_categorie=$categorie_inserted_in_bdd_ID";
    $stmt = $db->prepare($sql);
    $stmt->execute();
    // echo "<br>la categorie a bien été annulée";
  } else {
    // echo "<br>La categorie ne doit pas être annulée car elle n'est pas dans la bdd</br>";
  }

  foreach ($fichiers_ajoutes_au_serveurs_names as $file) {
    $filepath = "../uploads/" . $file;
    if (file_exists($filepath)) {
      unlink($filepath);
    }
  }
}
