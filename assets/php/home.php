<?php 
session_start();
if(isset($_SESSION['sess_user_name']) && $_SESSION['sess_user_id'] != "") {
  $_SESSION['isconnected'] = true;
  // header('Location:../../accueil.php');
} else {
  // header('Location:../../index.php');
}
?>