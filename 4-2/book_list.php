<?php 
  require_once("db_connect.php");
  require_once("function.php");
  session_start();

  check_user_logged_in();
  $errorMsg = "";
  $pdo = db_connect();
  
  try{
    $sql = "select * from books";
    $statement = $pdo->prepare($sql);
    $statement->execute();
  }catch(Exception $e){
    $e->getMessage();
    die();
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
  <a href="register_book.php">新規登録</a>
  <a href="logout.php">ログアウト</a>
  <table>
    <tr>
      <td>タイトル</td>
      <td>発売日</td>
      <td>在庫数</td>
      <td></td>
    </tr>
    <?php while($row=$statement->fetch(PDO::FETCH_ASSOC)){?>
      <tr>
        <td><?php echo $row["title"]?></td>
        <td><?php echo $row["date"]?></td>
        <td><?php echo $row["stock"]?></td>
        <td><a href="delete_book.php?book_id=<?php echo $row["id"]?>">削除</td>
      </tr>
    <?php }?>
  </table>
</body>
</html>