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
      $query = "SELECT * FROM `users` WHERE `username_users`=:username_users";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username_users', $username, PDO::PARAM_STR);
      // $stmt->bindValue('id_role', $role, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row) && password_verify($password,$row['password_users'])) {
        if($row['verified']){
        /******************** Your code ***********************/
        $_SESSION['sess_user_id']   = $row['id_users'];
        $_SESSION['sess_user_name'] = $row['username_users'];
        $_SESSION['sess_id_role'] = $row['id_role'];
        $_SESSION['isVerified'] = $row["verified"];
        // $_SESSION['sess_name'] = $row['nom_user'];
       header("Location: home.php");
      }
      else {
        header('Location: ../../pageconnexion.php?erreur=3');
             }
      } else {
        header('Location: ../../pageconnexion.php?erreur=2');
             }
    } catch (PDOException $e) {
      echo "Error : ".$e->getMessage();
                              }
  } else {
    header('Location: ../../pageconnexion.php?erreur=1');
         }
  }
?>