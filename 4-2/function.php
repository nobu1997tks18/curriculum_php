<?php 
  function redirect_page($page){
    header("Location:".$page);
  }

  function check_user_logged_in(){
    if(empty($_SESSION["username"])){
      redirect_page("login.php" );
    }
  }