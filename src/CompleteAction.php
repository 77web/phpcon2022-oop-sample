<?php

declare(strict_types=1);

namespace App;

class CompleteAction
{
    public function do(): void
    {
        header('Location: /complete.php');
        exit;
    }
}
