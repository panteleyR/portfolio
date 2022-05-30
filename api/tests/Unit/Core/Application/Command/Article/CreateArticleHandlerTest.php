<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\CreateArticleCommand;
use App\Core\Application\Command\Article\CreateArticleHandler;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use PHPUnit\Framework\TestCase;

class CreateArticleHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $command = $this->createMock(CreateArticleCommand::class);
        $command->method('getData')->willReturn([
            'title' => 'Db transaction',
            'description' => 'Description',
            'text' => 'text text text',
        ]);
        $articleRepository = $this->createMock(ArticleRepositoryInterface::class);
        $articleRepository->method('add')->willReturn('1');

        $handler = new CreateArticleHandler($articleRepository);
        $id = $handler->handle($command);
        $this->assertEquals($id, '1');
    }
}
