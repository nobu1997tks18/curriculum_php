<?php
  require_once("db_connect.php");
  require_once("function.php");
  session_start();
  check_user_logged_in();
  
  $id = $_GET["book_id"];
  if(empty($id)){
    redirect_page("book_list.php");
    exit;
  }

  $pdo = db_connect();
  try{
    $sql = "delete from books where id = :id";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":id", $id);
    $statement->execute();
    redirect_page("book_list.php");
  }catch(Exception $e){
    $e->getMessage();
    die();
  }
?>