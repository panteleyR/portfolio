<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;

class CreateArticleHandler
{
    public function __construct(private readonly ArticleRepositoryInterface $articleRepository) {}

    public function handle(CreateArticleCommand $command): string
    {
        $articleData = $command->getData();
        $article = new Article(...$articleData);

        return $this->articleRepository->add($article);
    }
}
