<?php

// erreur 1 = champs non remplis
//  erreur 2 = nombre de character trop long
//  erreur 3 = adresse deja utilisé
//  erreur 5 = user deja pris
//  erreur 4 = mdp et mdp 2 non identique
// erreur 6 = compte non créer
// erreur 7 = password incorrect
// erreur 8 = compte non validé

session_start();
include("db.php");
?>
<?php
if (isset($_POST['submitBtnLogin'])) {
  $username = htmlspecialchars(trim($_POST['Pseudo']));
  $password = htmlspecialchars(trim($_POST['password']));
  if ($username != "" && $password != "") {
    try {
      $query = "SELECT * FROM `users` WHERE `username_users`=:username_users";
      $stmt = $db->prepare($query);
      $stmt->bindParam('username_users', $username, PDO::PARAM_STR);
      // $stmt->bindValue('id_role', $role, PDO::PARAM_STR);
      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if ($count == 1 && !empty($row)) {
        if (password_verify($password, $row['password_users'])) {
          if ($row['verified']) {
            $_SESSION['sess_user_id']   = $row['id_users'];
            $_SESSION['sess_user_name'] = $row['username_users'];
            $_SESSION['sess_id_role'] = $row['id_role'];
            $_SESSION['isVerified'] = $row["verified"];
            if (isset($_POST['isme'])) {

              //On génére un cookie avec une id 
              $token_cookie = bin2hex(random_bytes(71));
              $token_hashed = password_hash($token_cookie, PASSWORD_DEFAULT);

              $query = "UPDATE users SET token_cookie = ? WHERE id_users = ?";
              $stmt = $db->prepare($query);
              $stmt->execute([$token_hashed, $row['id_users']]);
              //1 mois d'expiration du cookie
              $domain = ($_SERVER['HTTP_HOST'] != 'localhost') ? $_SERVER['HTTP_HOST'] : false;
              setcookie("remember", $token_hashed,  [
                'expires' => time() + 3600 * 24 * 31,
                'secure' => true,
                'httponly' => true,
              ], '/', $domain, false);
            }



            header("Location: home.php");
          } else {
            header('Location: ../../pageconnexion.php?erreur=8');
          }
        } else {
          header('Location: ../../pageconnexion.php?erreur=7');
        }
      } else {
        header('Location: ../../pageconnexion.php?erreur=6');
      }
    } catch (PDOException $e) {
      echo "Error : " . $e->getMessage();
    }
  } else {
    header('Location: ../../pageconnexion.php?erreur=1');
  }
}
?>