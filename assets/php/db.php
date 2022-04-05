<?php 
try {
  $db = new PDO('mysql:host=localhost;dbname=marvelcoc;charset=utf8mb4', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);  
  echo "Connection bdd reussie <br>";
} catch (PDOException $e) {
  echo "Connection failed : ". $e->getMessage();
}
?>