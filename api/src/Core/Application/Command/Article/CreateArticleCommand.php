<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

class CreateArticleCommand
{
    public function __construct(
        private readonly array $data,
    ) {}

    public function getData(): array
    {
        return $this->data;
    }
}
