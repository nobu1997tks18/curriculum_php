<?php
  require_once("function.php");
  session_start();
  $_SESSION = array();

  session_destroy();
  redirect_page("login.php");
?>