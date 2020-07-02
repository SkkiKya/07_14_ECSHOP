<?php

require 'common.php';
$pdo = connect_db();
$st = $pdo->query("SELECT * FROM items");
$goods = $st->fetchAll();
require 't_index.php';

?>

