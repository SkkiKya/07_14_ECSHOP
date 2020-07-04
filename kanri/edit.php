<?php

require '../model/funcs.php';
loginCheck();
$error = '';
$pdo = connect_db();
if (@$_POST['submit']) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $comment = $_POST['comment'];
    $price = $_POST['price'];
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
        $sql = "UPDATE items SET name=:name, comment=:comment, price=:price where id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
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
} else {
    $id = $_GET['id'];
    $sql = "SELECT * FROM items WHERE id=:id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_STR);
    $status = $stmt->execute();

    // データ登録処理後
    if ($status == false) {
        // SQL実行に失敗した場合はここでエラーを出力し，以降の処理を中止する
        $error = $stmt->errorInfo();
        echo json_encode(["error_msg" => "{$error[2]}"]);
        exit();
    } else {
        // 正常にSQLが実行された場合は一覧ページファイルに移動し，一覧ページの処理を実行する
        $row = $stmt->fetch();
        $name = $row['name'];
        $comment = $row['comment'];
        $price = $row['price'];
    }
}

require 't_edit.php';
