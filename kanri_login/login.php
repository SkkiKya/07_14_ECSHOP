<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <h1>管理者ログイン画面です</h1>
    <header>
        <nav>
            <div>
                <a href="../user_login/login.php">ユーザーログイン画面へ</a>
            </div>
        </nav>
    </header>

    <form action="login_act.php" method="post">
        <div>
            <fieldset>
                <legend>ログイン</legend>
                <label>IDNAME：<input type="text" name="id_name"></label>
                <label>PASSWORD：<input type="password" name="lpw"></label>
                <input type="submit" value="ログイン">

            </fieldset>
        </div>
    </form>
</body>
</html>