<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

use App\Core\Domain\Article\ArticleRepositoryInterface;

class DeleteArticleHandler
{
    public function __construct(private readonly ArticleRepositoryInterface $articleRepository) {}

    public function handle(DeleteArticleCommand $command): void
    {
        $this->articleRepository->delete($command->getId());
    }
}
