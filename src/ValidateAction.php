<?php

declare(strict_types=1);

namespace App;

class ValidateAction
{
    public function do(Box $box): Box
    {
        $errors = [];
        if (!isset($box->post['email']) || $box->post['email'] === '') {
            $errors['email'] = 'メールアドレスは必須です。';
        }
        if (!isset($box->post['title']) || $box->post['title'] === '') {
            $errors['title'] = 'タイトルは必須です。';
        }
        if (!isset($box->post['body']) || $box->post['body'] === '') {
            $errors['body'] = '本文は必須です。';
        }

        $box->validationErrors = $errors;

        return $box;
    }
}
