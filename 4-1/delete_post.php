<?php
// db_connect.phpの読み込み
require_once("db_connect.php");

// function.phpの読み込み
require_once("function.php");

// ログインしていなければ、login.phpにリダイレクト
check_user_logged_in();

// URLの?以降で渡されるIDをキャッチ
$id = $_GET['id'];
// もし、$idが空であったらmain.phpにリダイレクト
// 不正なアクセス対策
if (empty($id)) {
    header("Location: main.php");
    exit;
}

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "delete from posts where id = :id";
    // プリペアドステートメントの作成
    $statement = $pdo->prepare($sql);
    // idのバインド
    $statement->bindParam(":id", $_GET["id"]);
    // 実行
    $statement->execute();
    // main.phpにリダイレクト
    header("Location: main.php");
    exit;
} catch (PDOException $e) {
    // エラーメッセージの出力
    $e->getMessage();
    // 終了
    die();
}