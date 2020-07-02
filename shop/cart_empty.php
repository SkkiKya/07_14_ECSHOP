<?php
require '../model/funcs.php';
loginCheck();
// print_r($_SESSION['cart']);
// exit();
$_SESSION['cart'] = null;
header('Location: cart.php');
?>