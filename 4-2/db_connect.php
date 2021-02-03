<?php 
  define("DB_DATABASE","checktest4");
  define("DB_USER","root");
  define("DB_PASSWORD","root");
  define("PDO_DNS","mysql:host=localhost;charset=utf8;dbname=".DB_DATABASE);

  function db_connect(){
    try{
      $pdo = new PDO(PDO_DNS, DB_USER,DB_PASSWORD);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      return $pdo;
    }catch(Exception $e){
      $e->getMessge();
    }
  }
?>