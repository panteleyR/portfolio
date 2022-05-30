<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

use App\Core\Domain\Article\ArticleRepositoryInterface;

class ReadAllArticleHandler
{
    public function __construct(private readonly ArticleRepositoryInterface $articleRepository) {}

    public function handle(): array
    {
        return $this->articleRepository->getAll();
    }
}
