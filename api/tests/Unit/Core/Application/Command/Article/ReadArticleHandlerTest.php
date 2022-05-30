<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\ReadArticleCommand;
use App\Core\Application\Command\Article\ReadArticleHandler;
use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ReadArticleHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $command = $this->createMock(ReadArticleCommand::class);
        $command->method('getId')->willReturn('1');
        $articleRepository = $this->createMock(ArticleRepositoryInterface::class);
        $article = [
            'title' => 'Db transaction',
            'description' => 'Description',
            'text' => 'text text text',
            'id' => '123',
        ];
        $returnArticle = new Article(...$article);
        $articleRepository->method('getById')->willReturn($returnArticle);
        $handler = new ReadArticleHandler($articleRepository);
        $article = $handler->handle($command);
        $this->assertEquals('123', $article->getId());
    }
}
