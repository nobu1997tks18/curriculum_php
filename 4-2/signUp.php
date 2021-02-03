<?php 
  require_once("db_connect.php");
  require_once("function.php");
  session_start();
  $errorMsg = "";
  if(isset($_POST["signup"])){
    if(empty($_POST["username"])){
      $errorMsg = "ユーザ名を入力してください";
    }
    if(empty($_POST["password"])){
      $errorMsg = "パスワードを入力してください";
    }
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
      $username = $_POST["username"];
      $password = $_POST["password"];
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
    }

    insert_user($username, $password_hash);
    redirect_page("book_list.php");


  }

  function insert_user($username, $password){
    $pdo = db_connect();
    $sql = "insert into users (name, password) values (:username, :password)";
    try{
      $statement = $pdo->prepare($sql);
      $statement->bindParam(":username", $username);
      $statement->bindParam(":password", $password);
      $statement->execute();
      $_SESSION["username"] = $username;
    }catch(Exception $e){
      $e->getMessage();
      die();
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>ユーザ登録</h1>
  <?php echo htmlspecialchars($errorMsg, ENT_QUOTES)?>
  <form action="signUp.php" method="post">
    <input type="text" name="username" id="" placeholder="ユーザー名"><br/>
    <input type="password" name="password" id="" placeholder="パスワード"><br/>
    <input type="submit" name="signup" id="">
  </form>
</body>
</html>