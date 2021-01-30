<?php
  require_once("getData.php");
  $getData = new getData();
  $userData = $getData->getUserData();
  $fullName = $userData["last_name"].$userData["first_name"];
  $lastLogin = $userData["last_login"];

  $postData = $getData->getPostData();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Document</title>
</head>
<body>
  <div class="wrapper">
    <div class="header">
      <img src="1599315827_logo.png" class="header-img">
      <div>
        <p class="header-info username" >ようこそ <?php echo $fullName?>さん</p>
        <p class="header-info logintime">最終ログイン日：<?php echo $lastLogin ?></p>
      </div>  
    </div>
  
    <div class="table">
      <table class="set-border">
        <tr class="table-title">
          <th>記事ID</th>
          <th>タイトル</th>
          <th>カテゴリ</th>
          <th>本文</th>
          <th>投稿日</th>
        </tr>
        <?php foreach($postData as $data){?>
          <tr class="table-data">
            <td><?php echo $data["id"] ?></td>
            <td><?php echo $data["title"] ?></td>
            <td><?php 
            if($data["category_no"] === "1"){
              echo "食事";
            }elseif($data["category_no"] ==="2"){
              echo "旅行";
            }else{
              echo "その他";
            }
            ?></td>
            <td><?php echo $data["comment"] ?></td>
            <td><?php echo $data["created"] ?></td>
          </tr>
        <?php } ?>
      </table>
    </div>
  
    <div class="footer">
      <span>Y&I group.inc<span>
    </div>

  </div>
</body>
  </html>