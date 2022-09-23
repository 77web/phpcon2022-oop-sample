<?php

declare(strict_types=1);

namespace App;

class SendAction
{
    public function do(Box $box): Box
    {
        $template = <<<EOM
お客様メールアドレス: %s
ご用件: %s
本文:
%s
EOM;
        $message = sprintf($template, $box->post['email'], $box->post['title'], $box->post['body']);
        mb_language('ja');
        mb_internal_encoding('UTF-8');
        $box->emailSent = mb_send_mail($box->adminEmail, 'お問い合わせがありました', $message);

        return $box;
    }
}
