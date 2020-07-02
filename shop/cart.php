<?php

require '../model/funcs.php';
loginCheck();
$rows = array();
$sum = 0;
$pdo = connect_db();
if(!isset($_SESSION['cart'])){
  $_SESSION['cart'] = array();
}

if(@$_POST['submit']){
  @$_SESSION['cart'][$_POST['id']] += $_POST['num'];
}

foreach($_SESSION['cart'] as $code => $num) {
  $st = $pdo->prepare("SELECT * FROM items WHERE id=?");
  $st->execute(array($code));
  $row = $st->fetch();
  // print_r($st);
  // print_r($row);
  // exit();
  $st->closeCursor();
  $row['num'] = strip_tags($num);
  $sum += $num * $row['price'];
  $rows[] = $row;
}

require 't_cart.php';