<?php

declare(strict_types=1);

use App\ValidateAction;
use App\SendAction;
use App\ShowFormAction;

require __DIR__.'/../src/ValidateAction.php';
require __DIR__.'/../src/SendAction.php';
require __DIR__.'/../src/ShowFormAction.php';
require __DIR__.'/../src/CompleteAction.php';

$validateAction = new ValidateAction();
$sendAction = new SendAction();
$showFormAction = new ShowFormAction();

$adminEmail = 'me@example.com';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = $validateAction->do();

    if (empty($errors)) {
        $sendAction->do($adminEmail);
    }
}

$showFormAction->do($errors);
