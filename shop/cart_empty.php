<?php
require '../model/funcs.php';
// print_r($_SESSION['cart']);
// exit();
$_SESSION['cart'] = null;
header('Location: cart.php');
?>