<?php

declare(strict_types=1);

namespace App\Tests;

use App\Box;
use App\ValidateAction;
use PHPUnit\Framework\TestCase;

class ValidateActionTest extends TestCase
{
    public function test_正常(): void
    {
        $box = new Box();
        $box->post = ['email' => 'user@example.com', 'title' => 'test', 'body' => 'test-body'];
        $SUT = new ValidateAction();
        $returnedBox = $SUT->do($box);
        $this->assertEquals([], $returnedBox->validationErrors);
    }

    public function test_メールアドレス未記入(): void
    {
        $box = new Box();
        $box->post = ['title' => 'test', 'body' => 'test-body'];
        $SUT = new ValidateAction();
        $returnedBox = $SUT->do($box);
        $this->assertEquals(['email' => 'メールアドレスは必須です。'], $returnedBox->validationErrors);
    }

    public function test_タイトル未記入(): void
    {
        $box = new Box();
        $box->post = ['email' => 'user@example.com', 'body' => 'test-body'];
        $SUT = new ValidateAction();
        $returnedBox = $SUT->do($box);
        $this->assertEquals(['title' => 'タイトルは必須です。'], $returnedBox->validationErrors);
    }

    public function test_本文未記入(): void
    {
        $box = new Box();
        $box->post = ['email' => 'user@example.com', 'title' => 'test'];
        $SUT = new ValidateAction();
        $returnedBox = $SUT->do($box);
        $this->assertEquals(['body' => '本文は必須です。'], $returnedBox->validationErrors);
    }

    public function test_2つの項目が未記入(): void
    {
        $box = new Box();
        $box->post = ['email' => 'user@example.com'];
        $SUT = new ValidateAction();
        $returnedBox = $SUT->do($box);
        $this->assertEquals(['title' => 'タイトルは必須です。', 'body' => '本文は必須です。'], $returnedBox->validationErrors);
    }
}
