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
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    $first_answer = $_POST["first_answer"];
    $second_answer = $_POST["second_answer"];
    $third_answer = $_POST["third_answer"];
    $number = $_POST["number"];
    $language = $_POST["language"];
    $command = $_POST["command"];
    $name = $_POST["name"];
    //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する
    function checkAnswer($answer, $correctAnswer ){
      if($answer == $correctAnswer){
        echo "正解！";
      }else{
        echo "残念・・・";
      }
    };
    ?>
    <p><?php echo $name?>さんの結果は・・・？</p>
    <p>①の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php checkAnswer($first_answer, $number);?>
    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php checkAnswer($second_answer, $language);?>
    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php checkAnswer($third_answer, $command);?>
  </body>
</html>