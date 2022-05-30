<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;

class ReadArticleHandler
{
    public function __construct(private readonly ArticleRepositoryInterface $articleRepository) {}

    public function handle(ReadArticleCommand $command): Article
    {
        return $this->articleRepository->getById($command->getId());
    }
}
