<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\ReadArticleCommand;
use PHPUnit\Framework\TestCase;

class ReadArticleCommandTest extends TestCase
{
    public function testConstruct(): void
    {
        $id = '1';
        $command = new ReadArticleCommand($id);
        $this->assertEquals($id, $command->getId());
    }
}
