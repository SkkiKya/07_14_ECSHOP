<?php

session_start();
// データベースを接続する関数
function connect_db() {
  
  $db = 'mysql';
  $dbname = 'shop';
  $chart = 'utf8';
  $port = '3308';
  $host = 'localhost';
  
  // DB接続の設定
  $dbn = "$db:dbname=$dbname;charset=$chart;port=$port;host=$host";
  $user = 'root';
  $pwd = '';
  // DB接続を確認
  try {
    // ここでDB接続処理を実行する
    $pdo = new PDO($dbn, $user, $pwd);
    return $pdo;
  } catch (PDOException $e) {
    // DB接続に失敗した場合はここでエラーを出力し，以降の処理を中止する
    echo json_encode(["db error" => "{$e->getMessage()}"]);
    exit();
  }
   
}
// 画像データを読み込む関数
function img_tag($code) {
  if (file_exists("../shop/image/$code.jpg")) {
      $name = $code;
  }else {
      $name ='sample_s';
  }
  return "<img src='../shop/image/$name.jpg' alt=''>";
}

// エスケープ関数
function h($val){
  return htmlspecialchars($val, ENT_QUOTES);
}