<!-- 画像をアップロードするフォーム -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品アップロード</title>
  <link rel="stylesheet" href="css/kanri.css">
</head>
<body>
  <div class="base">
    <?php if($error):?>
      <?= "<span class=\"error\">$error</span>" ?>
      <?php endif ?>
      <form action="upload.php" method="post" enctype="multipart/form-data">
      <p>
        商品画像（JPEGのみ）<br>
        <input type="file" name="pic">
      </p>
      <p>
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" name="submit" value="追加">
      </p>
    </form>
  </div>
  <div class="base">
    <a href="index.php">一覧に戻る</a>
  </div>
  <?php include '../model/logout_button.php'; ?>
</body>
</html>