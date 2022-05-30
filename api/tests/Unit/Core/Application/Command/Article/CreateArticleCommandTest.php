<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\CreateArticleCommand;
use PHPUnit\Framework\TestCase;

class CreateArticleCommandTest extends TestCase
{
    public function testConstruct(): void
    {
        $article = [
            'title' => 'Db transaction',
            'description' => 'Description',
            'text' => 'text text text',
        ];

        $command = new CreateArticleCommand($article);
        $this->assertEquals($article, $command->getData());
    }
}
