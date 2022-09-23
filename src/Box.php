<?php

declare(strict_types=1);

namespace App;

class Box
{
    public string $adminEmail = '';
    public array $server = [];
    public array $post = [];
    public array $validationErrors = [];
    public bool $emailSent = false;
    public bool $exit = false;
}

