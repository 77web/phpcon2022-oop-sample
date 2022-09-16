<?php

declare(strict_types=1);

namespace App;

class ValidateAction
{
    public function do(): array
    {
        $errors = [];
        if (!isset($_POST['email']) || $_POST['email'] === '') {
            $errors['email'] = 'メールアドレスは必須です。';
        }
        if (!isset($_POST['title']) || $_POST['title'] === '') {
            $errors['title'] = 'タイトルは必須です。';
        }
        if (!isset($_POST['body']) || $_POST['body'] === '') {
            $errors['body'] = '本文は必須です。';
        }

        return $errors;
    }
}
