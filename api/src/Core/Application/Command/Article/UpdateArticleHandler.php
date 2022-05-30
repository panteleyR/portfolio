<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use DateTime;

class UpdateArticleHandler
{
    public function __construct(private readonly ArticleRepositoryInterface $articleRepository) {}

    public function handle(UpdateArticleCommand $command): void
    {
        $article = $this->articleRepository->getById($command->getId());
        $article->hydrateData($command->getData());
        $article->setUpdatedAt((new DateTime()));
        $this->articleRepository->update($article);
    }
}
