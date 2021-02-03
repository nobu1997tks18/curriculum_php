<?php 
  require_once("db_connect.php");
  require_once("function.php");
  session_start();

  check_user_logged_in();
  $errorMsg = "";
  $pdo = db_connect();
  if(isset($_POST["register"])){
    if(empty($_POST["title"])){
      $errorMsg="タイトルを入力してください";
    }else if(empty($_POST["publish_date"])){
      $errorMsg="発売日を登録してください";
    }else if(empty($_POST["stock"])){
      $errorMsg="在庫数を登録してください";
    }
    
    if(!empty($_POST["title"])&& !empty($_POST["publish_date"])&& !empty($_POST["stock"])){
      $title = $_POST["title"];
      $publish_date = $_POST["publish_date"];
      $stock = $_POST["stock"];
      $sql= "insert into books (title, date, stock) values (:title, :publish_date, :stock)";
      try{
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":title", $title);
        $statement->bindParam(":publish_date", $publish_date);
        $statement->bindParam(":stock", $stock);
        $statement->execute();
        redirect_page("book_list.php");
      }catch(Exception $e){
        $e->getMessage();
        die();
      }
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
  <h1>本登録画面</h1>
  <?php echo htmlspecialchars($errorMsg, ENT_QUOTES);?>
  <form action="register_book.php" method="post">
    <input type="text" name="title" placeholder="タイトル"><br/>
    <input type="date" name="publish_date" placeholder="発売日"><br/>
    <input type="number" name="stock" placeholder="在庫数"><br/>
    <input type="submit" name="register" value="登録">
  </form>
</body>
</html>