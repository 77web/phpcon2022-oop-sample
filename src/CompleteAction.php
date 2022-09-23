<?php

declare(strict_types=1);

namespace App;

class CompleteAction
{
    public function do(Box $box): Box
    {
        header('Location: /complete.php');

        return $box;
    }
}
