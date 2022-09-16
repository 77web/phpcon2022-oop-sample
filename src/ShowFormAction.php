<?php

declare(strict_types=1);

namespace App;

class ShowFormAction
{
    public function do(array $errors): void
    {
        include __DIR__.'/../templates/form.php';
    }
}
