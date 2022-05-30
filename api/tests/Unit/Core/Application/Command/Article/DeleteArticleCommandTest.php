<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\DeleteArticleCommand;
use PHPUnit\Framework\TestCase;

class DeleteArticleCommandTest extends TestCase
{
    public function testConstruct(): void
    {
        $id = '1';
        $command = new DeleteArticleCommand($id);
        $this->assertEquals($id, $command->getId());
    }
}
