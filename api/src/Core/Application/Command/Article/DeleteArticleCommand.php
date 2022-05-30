<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

class DeleteArticleCommand
{
    public function __construct(
        private readonly string $id,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }
}
