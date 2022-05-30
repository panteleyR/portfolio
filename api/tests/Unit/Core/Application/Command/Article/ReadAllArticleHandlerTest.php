<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\ReadAllArticleHandler;
use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use PHPUnit\Framework\TestCase;

class ReadAllArticleHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $articleRepository = $this->createMock(ArticleRepositoryInterface::class);
        $article = [
            'title' => 'Db transaction',
            'description' => 'Description',
            'text' => 'text text text',
            'id' => '1',
        ];
        $returnArticleList[] = new Article(...$article);
        $article = [
            'title' => 'Db transaction',
            'description' => 'Description',
            'text' => 'text text text',
            'id' => '2',
        ];
        $returnArticleList[] = new Article(...$article);
        $articleRepository->method('getAll')->willReturn($returnArticleList);
        $handler = new ReadAllArticleHandler($articleRepository);
        $articleList = $handler->handle();
        $this->assertEquals('1', current($articleList)->getId());
        $this->assertEquals('2', next($articleList)->getId());
    }
}
