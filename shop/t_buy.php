<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>購入 | Noodle Shop</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <h1>購入</h1>
  <div class="base">
    <?php if($error){
      echo "<span class='error'>$error</span>";
    } ?>
    <form action="buy.php" method="post">
      <p>
        お名前<br>
        <input type="text" name="name" value="<?= $name ?>">
      </p>
      <p>
        メールアドレス<br>
        <input type="text" name="address" value="<?= $email ?>">
      </p>
      <p>
        電話番号<br>
        <input type="text" name="tel" value="<?= $tel ?>">
      </p>
      <p>
        <input type="submit" name="submit" value="購入">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="index.php">お買い物い戻る</a>
    <a href="cart.php">カートに戻る</a>
  </div>
  <?php include '../model/logout_button.php'; ?>
</body>
</html>