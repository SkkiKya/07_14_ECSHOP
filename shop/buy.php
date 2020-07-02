<?php

require '../model/funcs.php';
loginCheck();
$error = $name = $email = $address = $tel = '';
$email = $_SESSION["email"];
if(@$_POST['submit']) {
  $name = h($_SESSION['u_name']);
  $address = h($_POST['address']);
  $tel = h($_POST['tel']);
  if (!$name) {
      $error .= 'お名前を入力してください<br>';
  }
  if (!$email) {
      $error .= 'メールアドレスを入力してください<br>';
  }
  if (!$address) {
      $error .= '住所を入力してください<br>';
  }
  if (!$tel) {
      $error .= '電話番号を入力してください<br>';
  }if(preg_match('/[^\d-]/', $tel)){
    $error .= '電話番号が正しくありません。<br>';
  }
  if(!$error) {
    $pdo = connect_db();
    $body = "商品が購入されました。<br>
    お名前: $name<br>
    ご住所: $address<br>
    電話番号: $tel<br>";
    foreach($_SESSION['cart'] as $code => $num) {
      $st = $pdo->prepare("SELECT * FROM items WHERE id=?");
      $st->execute(array($code));
      $row = $st->fetch();
      $st->closeCursor();
      $body .= "商品名: {$row['name']}<br>
                単価: {$row['price']}<br>
                数量: $num<br>";
    }
    $from = "bookm9842@localhost";
    $to = $email;
    mb_send_mail($to, "購入メール", $body, "From: $from");
    $_SESSION['cart'] = null;
    require 't_buy_complete.php';
    exit();
  }
}

require 't_buy.php';
