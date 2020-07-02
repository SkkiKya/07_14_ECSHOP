<!-- 管理画面のファイル -->
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品一覧｜Noodle Shop</title>
  <link rel="stylesheet" href="kanri.css">
</head>
<body>
  <table>
    <?php foreach($goods as $g): ?>
    <tr>
      <td>
        <?= img_tag($g['id']); ?>
      </td>
      <td>
        <p class="goods"><?= $g['name']?></p>
        <p><?= nl2br($g['comment']) ?></p>
      </td>
      <td width="80">
        <P>&yen;<?= $g['price'] ?></P>
        <P><a href="edit.php?id=<?=$g['id']?>">修正</a></P>
        <P><a href="upload.php?id=<?=$g['id']?>">アップロード</a></P>
        <P><a href="delete.php?id=<?=$g['id']?>" onclick="return confirm('削除してよろしいですか')">削除</a></P>
      </td>
    </tr>
    <?php endforeach ?>
  </table>
      <div class="base">
        <a href="insert.php">新規追加</a>
        <a href="../shop/index.php" target="_blank">サイト確認</a>
      </div>
      <?php include '../model/logout_button.php'; ?>
</body>
</html>