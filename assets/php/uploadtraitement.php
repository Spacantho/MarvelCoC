<?php

if (isset($_POST['videoname']) && isset($_POST['videodesc'])){

  $title = $_POST['videoname'];
  $lienyoutube = $_POST['videolink'];
  $desc = $_POST['videodesc'];
 
  echo("Titre: ");
  echo($title);
  echo("<br>");
  
  echo("Lien: ");
  echo($lienyoutube);
  echo("<br>");
 
  echo("Desc: ");
  echo($desc);
  echo("<br>");
 
 $videoPath = upload("videofile","mp4");
 $imagePath = upload("miniature", "png");

 include 'db.php';

$sql = "INSERT INTO video (titre_video, description_video, miniature_video, date_video, lien_video, typelien_video, nb_likes, nb_dislikes, id_users, id_categorie) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt= $db->prepare($sql);
$stmt->execute([$title, $desc, $imagePath, date('Y-m-d H:i:s'), $videoPath, "uploaded", 0, 0, 2, 1]);
 

}else{
  echo("Vous n'avez pas rempli tous les champs");
}


function upload($path, $fileTypeExpected){
  
  $nomFinalDuFichier = "";

 $target_dir = "../uploads/";

  $f_name = $_FILES[$path]["name"];
  $t_name = $_FILES[$path]["tmp_name"];
  $randomString = generateRandomString();

  $fupload = move_uploaded_file($t_name, $target_dir . $randomString . $f_name);
 
  
  $target_file = $target_dir . basename($_FILES[$path]["name"]);
  $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
 
 if ($fileType==$fileTypeExpected){
   if ($fupload){
     echo $fileType." uploaded<br>";
     $nomFinalDuFichier = $randomString . $f_name;
  }else{
     echo "Impossible d'upload le fichier ".$fileTypeExpected."<br>";
  }
 }else{
   echo "Impossible d'upload le fichier ".$fileTypeExpected.", le format n'est pas le bon ou le fichier est inexistant<br>";
 }

 return $nomFinalDuFichier;
}

function generateRandomString($length = 20) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
      $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
}

?>