<?php
  require_once("db_connect.php");
  require_once("function.php");
  $errorMsg="";
  session_start();
  if(isset($_POST["login"])){
    if(empty($_POST["username"])){
      $errorMsg="ユーザ名を入力してください";
    }
    if(empty($_POST["password"])){
      $errorMsg="パスワードを入力してください";
    }
    if(!empty($_POST["username"]) && !empty($_POST["password"])){
      $username= htmlspecialchars($_POST["username"], ENT_QUOTES);
      $password= htmlspecialchars($_POST["password"], ENT_QUOTES);
      $pdo = db_connect();
      try{
        $sql = "select * from users where name = :name";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":name",$username);
        $statement->execute();
      }catch(Exception $e){
        $e->getMessage();
        die();
      }

      if($row = $statement->fetch(PDO::FETCH_ASSOC)){
        if(password_verify($password, $row["password"])){
          $_SESSION["username"] = $row["name"];
          redirect_page("book_list.php");
          exit;
        }else{
          $errorMsg = "パスワードが間違えています";
        }
      }else{
        $errorMsg = "ユーザ名、またはパスワードを間違えています";
      }
    }

  }
  



?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <h1>ログイン画面</h1>
  <a href="signUp.php">新規登録ページ</a>
  <?php echo htmlspecialchars($errorMsg, ENT_QUOTES);?>
  <form action="login.php" method="post">
    <input type="text" name = "username" placeholder="ユーザー名" ><br/>
    <input type="password" name = "password" placeholder="パスワード" ><br/>
    <input type="submit" name = "login" value="ログイン">
  </form>
</body>
</html> 