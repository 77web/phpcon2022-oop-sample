<!DOCTYPE html>
<html>
<head>
    <title>メールフォーム</title>
</head>
<body>
<form action="index.php" method="POST">
    <fieldset>
        <label for="email">
            メールアドレス
        </label>
        <input type="email" value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" id="email" name="email">
    </fieldset>
    <fieldset>
        <label for="title">
            ご用件
        </label>
        <input type="text" value="<?php echo htmlspecialchars($_POST['title'] ?? ''); ?>" id="title" name="title">
    </fieldset>
    <fieldset>
        <label for="body">
            お問い合わせ内容
        </label>
        <textarea name="body" id="body" cols="100" rows="10"><?php echo htmlspecialchars($_POST['body'] ?? ''); ?></textarea>
    </fieldset>
    <button type="submit">送信</button>
</form>
</body>
</html>
