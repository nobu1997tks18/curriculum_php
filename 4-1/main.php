<?php
// function.phpの読み込み
require_once("function.php");
require_once("db_connect.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();
$pdo = db_connect();
$sql = "SELECT * FROM POSTS";
try{
    $statement = $pdo->prepare($sql);
    $statement->execute();
}catch(Exception $e){
    "Error".$e->getMessage();
}

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>メイン</title>
</head>
<body>
    <h1>メインページ</h1>
    <p>ようこそ<?php echo $_SESSION["user_name"]; ?>さん</p>
    <a href="logout.php">ログアウト</a>

    <table>
        <tr>
            <th>記事ID</th>
            <th>タイトル</th>
            <th>本文</th>
            <th>投稿日</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
        <?php while($row = $statement->fetch(PDO::FETCH_ASSOC)){ ?>
            <tr>
                <td><?php echo $row["id"] ?></td>
                <td><?php echo $row["title"] ?></td>
                <td><?php echo $row["content"] ?></td>
                <td><?php echo $row["time"] ?></td>
                <td><a href="detail_post.php?id=<?php echo $row['id']; ?>">詳細</a></td>
                <td><a href="edit_post.php?id=<?php echo $row['id']; ?>">編集</a></td>
                <td><a href="delete_post.php?id=<?php echo $row['id']; ?>">削除</a></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>