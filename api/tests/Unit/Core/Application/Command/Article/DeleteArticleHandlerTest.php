<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\DeleteArticleCommand;
use App\Core\Application\Command\Article\DeleteArticleHandler;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use PHPUnit\Framework\TestCase;

class DeleteArticleHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $command = $this->createMock(DeleteArticleCommand::class);
        $command->method('getId')->willReturn('1');
        $articleRepository = $this->createMock(ArticleRepositoryInterface::class);
        $articleRepository
            ->expects($this->once())
            ->method('delete')
            ->with($this->equalTo('1'));
        $handler = new DeleteArticleHandler($articleRepository);
        $handler->handle($command);
    }
}
