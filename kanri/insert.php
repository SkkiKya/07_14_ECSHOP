<?php

require 'common.php';
$error = $name = $comment = $price = '';
$pdo = connect_db();
if (@$_POST['submit']) {
    $name = h($_POST['name']);
    $comment = h($_POST['comment']);
    $price = h($_POST['price']);
    if (!$name) {
        $error .= '商品名を入力してください<br>';
    }
    if (!$comment) {
        $error .= 'コメントを入力してください<br>';
    }
    if (!$price) {
        $error .= '価格を入力してください<br>';
    }
    if (preg_match('/\D/', $price)) {
        $error .= '価格が不正です。<br>';
    }
      
    if (!$error) {
        $sql = "INSERT INTO items(name, comment, price) VALUE(:name, :comment, :price)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $status = $stmt->execute();

        // データ登録処理後
        if ($status == false) {
            // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
            $error = $stmt->errorInfo();
            echo json_encode(["error_msg" => "{$error[2]}"]);
            exit();
        } else {
            // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
            header("Location: index.php");
            exit();
        }
    }
}
require 't_insert.php';
