<?php

declare(strict_types=1);

namespace App;

class ShowFormAction
{
    public function do(Box $box): Box
    {
        $errors = $box->validationErrors;
        include __DIR__.'/../templates/form.php';

        return $box;
    }
}
