  <?php 
  include_once("db_connect.php");

  $errorMessage = "";
  $finishedMessage = "";

  if(isset($_POST["signUp"])){
    if(empty($_POST["name"])){
      $errorMessage="名前が未入力です";
    }else if(empty($_POST["password"])){
      $errorMessage="パスワードが未入力です";
    }

    if(!empty($_POST["name"]) && !empty($_POST["password"])){
      $name = $_POST['name'];
      $password = $_POST['password'];
      $password_hash = password_hash($password, PASSWORD_DEFAULT);
    }
    insert_user($name, $password_hash);
    $finishedMessage = "登録完了です";
  }

  function insert_user($name, $password_hash){
    // $sql = "insert into users (name, password) values (:name, :password)";
    $sql = "INSERT INTO users (name, password) VALUES (:name, :password)";
    $pdo = db_connect();
    try{
      $statement = $pdo->prepare($sql);
      $statement->bindParam(":name", $name);
      $statement->bindParam(":password", $password_hash);
      $statement->execute();
    }catch(Exception $e){
      echo "Error".$e->getMessage();
      die();
    }
  }
?>

<!DOCTYPE html>
<html>
  <head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  </head>
  <body>
    <h1>新規登録</h1>
    <?php echo htmlspecialchars($errorMessage, ENT_QUOTES)?>
    <?php echo htmlspecialchars($finishedMessage, ENT_QUOTES)?>
    <form method="POST" action="signUp.php">
      user:<br>
      <input type="text" name="name" id="name" value="">
      <br>
      password:<br>
      <input type="password" name="password" id="password" value=""><br>
      <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
  </body>
  </html>
  