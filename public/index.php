<?php

declare(strict_types=1);

use App\Box;
use App\ValidateAction;
use App\SendAction;
use App\CompleteAction;
use App\ShowFormAction;

require __DIR__.'/../src/ValidateAction.php';
require __DIR__.'/../src/SendAction.php';
require __DIR__.'/../src/ShowFormAction.php';
require __DIR__.'/../src/CompleteAction.php';
require __DIR__.'/../src/Box.php';

$validateAction = new ValidateAction();
$sendAction = new SendAction();
$showFormAction = new ShowFormAction();
$completeAction = new CompleteAction();

$box = new Box();
$box->adminEmail = 'me@example.com';
$box->server = $_SERVER;
$box->post = $_POST;

if ($box->server['REQUEST_METHOD'] === 'POST') {
    $box = $validateAction->do($box);

    if (empty($box->validationErrors)) {
        $box = $sendAction->do($box);
        if ($box->emailSent) {
            $completeAction->do($box);
            exit;
        }
    }
}

$showFormAction->do($box);
