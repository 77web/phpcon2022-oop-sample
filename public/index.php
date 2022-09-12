<?php

declare(strict_types=1);

$adminEmail = 'me@example.com';

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!isset($_POST['email']) || $_POST['email'] === '') {
        $errors['email'] = 'メールアドレスは必須です。';
    }
    if (!isset($_POST['title']) || $_POST['title'] === '') {
        $errors['title'] = 'タイトルは必須です。';
    }
    if (!isset($_POST['body']) || $_POST['body'] === '') {
        $errors['body'] = '本文は必須です。';
    }

    if (empty($errors)) {
        $template = <<<EOM
お客様メールアドレス: %s
ご用件: %s
本文:
%s
EOM;
        $message = sprintf($template, $_POST['email'], $_POST['title'], $_POST['body']);
        mb_language('ja');
        mb_internal_encoding('UTF-8');
        if (mb_send_mail($adminEmail, 'お問い合わせがありました', $message)) {
            header('Location: /complete.php');
            exit;
        }
    }
}
?><!DOCTYPE html>
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
