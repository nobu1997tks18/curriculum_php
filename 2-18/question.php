<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="styles.css" rel="stylesheet">
  <title></title>
  <link rel="stylesheet" href="">
</head>
  <body>
    <?php
    //POST送信で送られてきた名前を受け取って変数を作成
    $name = $_POST["name"];
    //①画像を参考に問題文の選択肢の配列を作成してください。
    $numbers = [80,22,20,21];
    $languages = ["PHP","Python","JAVA","HTML"];
    $commands = ["join","select","insert","update"];
    //② ①で作成した、配列から正解の選択肢の変数を作成してください
    $correct_answer1 = "80";
    $correct_answer2 = "HTML";
    $correct_answer3 = "select";
    ?>
    <p>お疲れ様です<?php echo $name?>さん</p>
    <!--フォームの作成 通信はPOST通信で-->
    <form action="answer.php" method="post">
      <h2>①ネットワークのポート番号は何番？</h2>
      <!--③ 問題のradioボタンを「foreach」を使って作成する-->
      <?php foreach($numbers as $number){ ?>
        <input type="radio" name="first_answer" value=<?php echo $number?>><?php echo $number?>
      <?php } ?>
      <h2>②Webページを作成するための言語は？</h2>
      <!--③ 問題のradioボタンを「foreach」を使って作成する-->
      <?php foreach($languages as $language){ ?>
        <input type="radio" name="second_answer" value=<?php echo $language?>><?php echo $language?>
      <?php } ?>
      <h2>③MySQLで情報を取得するためのコマンドは？</h2>
      <!--③ 問題のradioボタンを「foreach」を使って作成する-->
      <?php foreach($commands as $command){ ?>
        <input type="radio" name="third_answer" value=<?php echo $command?>><?php echo $command?>
      <?php } ?>
      <!--問題の正解の変数と名前の変数を[answer.php]に送る-->
      <input type ="hidden" name="number" value=<?php echo $correct_answer1?>>
      <input type ="hidden" name="language" value=<?php echo $correct_answer2 ?>> 
      <input type ="hidden" name="command" value=<?php echo $correct_answer3?>>
      <input type ="hidden" name ="name" value=<?php echo $name?>><br>
      <input type="submit" value="回答する">
    </form>
  </body>
</html>
