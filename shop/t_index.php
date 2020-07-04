<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Noodle Shop</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>Noodle Shop</h1>
  <h2>こんにちは！<?= h($_SESSION['u_name'])?>さん</h2>
  <a href="cart.php">カートを見る</a>
  <table>
    <?php foreach ($goods as $g): ?>
    <tr>
    <td>
    <?= img_tag($g['id']);?>
    </td>
    <td>
      <p class="goods"><?php echo $g['name'];?></p>
      <p><?= nl2br($g['comment']); ?></p>
    </td>
    <td width="80">
      <p><?= $g['price'] ?> 円</p>
      <form action="cart.php" method="post">
        <select name="num" id="">
          <?php
          for($i=0; $i<=9; $i++){
            echo "<option>$i</option>";
          }
          ?>
        </select>
        <input type="hidden" name="id" value="<?= $g['id'] ?>">
        <input type="submit" value="カートへ" name="submit">
      </form>
    </td>
    </tr>
    <?php endforeach ?>
  </table>
          <?php include '../model/logout_button.php'; ?>
</body>
</html>