<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品追加</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
  <div class="base">
    <?php if($error):?>
      <?= "<span class='error'>$error</span>" ?>
      <?php endif ?>
      <form action="insert.php" method="post">
        <p>
          商品名<br>
          <input type="text" name="name" value="<?= $name ?>">
        </p>
        <p>
          商品説明<br>
          <textarea type="text" name="comment" row="10" cols="60"><?=$comment?></textarea>
        </p>
        <p>
        価格<br>
        &yen;<input type="text" name="price" value="<?=$price?>">
        </p>
        <p>
          <input type="submit" name="submit" value="追加">
        </p>
      </form>
  </div>
  <div class="base">
    <a href="index.php">一覧に戻る</a>
  </div>
</body>
</html>