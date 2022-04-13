<?php

try {
  $db = new PDO('mysql:host=localhost;dbname=marvelcoc;charset=utf8mb4', 'root', '');
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
  echo "Connection failed : ". $e->getMessage();
}


// class dbtab
// {
//     protected $data;
//     public function __construct(){
//       try {
//         $this->data = new PDO('mysql:host=localhost;dbname=marvelcoc;charset=utf8mb4', 'root', '');
//       } catch (PDOException $e) {
//         echo "Connection failed : ". $e->getMessage();
//       }
//     }
//     public function selectbdd(){

//         $request = "SELECT * FROM users";
    
//         $users = $this->data->prepare($request);
    
//         $users->execute();
    
//         $execute = $users ->fetchAll();

//         return $execute;
//       }
//     public function selectrole(){

//         $sqlrequest = "SELECT * FROM role";
    
//         $role = $this->data->prepare($sqlrequest);
    
//         $role->execute();
    
//         $role = $role ->fetchAll();

//         return $role;
//       }
    
// }

// $bdd = new dbtab();
// $result = $bdd->selectbdd();

// $role = $bdd->selectrole();