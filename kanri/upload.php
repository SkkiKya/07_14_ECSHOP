<?php
// 画像をアップロードするファイル
require 'common.php';

$error = '';

if(@$_POST['submit']){
  $id = $_POST['id'];
  if(move_uploaded_file($_FILES['pic']['tmp_name'], "../shop/image/$id.jpg")){
    header('Location: index.php');
    exit();
  } else {
    $error .= 'ファイルを選択してください。<br>';
  }
}else {
  $id = $_GET['id'];
}
require 't_upload.php';