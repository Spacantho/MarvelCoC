<?php 
session_start();
include("db.php");
?>
<?php
if(isset($_POST['submitBtnLogin'])) {
  $username = trim($_POST['Pseudo']);
  $password = trim($_POST['password']);
  if($username != "" && $password != "") {
    try {
      $query = "SELECT * FROM `users` WHERE `nom_user`=:username";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username', $username, PDO::PARAM_STR);
      // $stmt->bindValue('id_role', $role, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        if(!password_verify($password,$row['password_users']))
          die("Mauvais pass");

        /******************** Your code ***********************/
        $_SESSION['sess_user_id']   = $row['id_user'];
        $_SESSION['sess_user_name'] = $row['nom_user'];
        $_SESSION['sess_id_role'] = $row['id_role'];
        $_SESSION['sess_name'] = $row['nom_user'];
       header("Location: home.php");
      } else {
        header('Location: signup.php?erreur=2');
             }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
                              }
  } else {
    header('Location: signup.php?erreur=1');
         }
  }
?>