<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>カート | Noodle Shop</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>カート</h1>
  <table>
    <tr><th>商品</th><th>単価</th><th>数量</th><th>小計</th></tr>
    <?php foreach($rows as $r): ?>
      <tr>
        <td><?= $r['name'] ?></td>
        <td><?= $r['price'] ?></td>
        <td><?= $r['num'] ?></td>
        <td><?= $r['price'] * $r['num'] ?></td>
      </tr>
      <?php endforeach ?>
      <tr><td colspan="2"></td><td><strong>合計</strong></td><td><?= $sum ?> 円</td></tr>
  </table>
  <div class="base">
    <a href="index.php">お買い物に戻る</a>
    <a href="cart_empty.php">カートを空にする</a>
    <a href="buy.php">購入する</a>
  </div>
</body>
</html>