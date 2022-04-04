<?php 
session_start();
if(isset($_SESSION['sess_user_name']) && $_SESSION['sess_user_id'] != "" && $_SESSION['isVerified']) {
  $_SESSION['isconnected'] = true;
    header('Location:../../categories.php');
} else {
    header('Location:../../index.php?log_error=error_verified');
}
?>