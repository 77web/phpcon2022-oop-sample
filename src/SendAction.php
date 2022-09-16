<?php

declare(strict_types=1);

namespace App;

class SendAction
{
    public function do(string $adminEmail): void
    {
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
            $completeAction = new CompleteAction();
            $completeAction->do();
        }
    }
}
