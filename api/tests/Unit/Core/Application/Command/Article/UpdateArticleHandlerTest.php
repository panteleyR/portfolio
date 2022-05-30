<?php

declare(strict_types=1);

namespace Tests\Unit\Core\Application\Command\Article;

use App\Core\Application\Command\Article\UpdateArticleCommand;
use App\Core\Application\Command\Article\UpdateArticleHandler;
use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use PHPUnit\Framework\TestCase;

class UpdateArticleHandlerTest extends TestCase
{
    public function testHandler(): void
    {
        $articleData = [
            'title' => 'Db transaction edited',
            'description' => 'Description',
            'text' => 'text text text',
            'id' => '1',
        ];
        $command = $this->createMock(UpdateArticleCommand::class);
        $command->method('getId')->willReturn('1');
        $command->method('getData')->willReturn($articleData);
        $articleRepository = $this->createMock(ArticleRepositoryInterface::class);
        $articleRepository
            ->expects($this->once())
            ->method('update')
            ->with($this->callback(
                fn (Article $subject) =>
                    $subject->getText() === $articleData['text']
                    && $subject->getId() === $articleData['id']
                    && $subject->getDescription() === $articleData['description']
                    && $subject->getTitle() === $articleData['title']
            ));
        $handler = new UpdateArticleHandler($articleRepository);
        $handler->handle($command);
    }
}
