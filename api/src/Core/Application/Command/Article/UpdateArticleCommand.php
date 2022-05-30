<?php

declare(strict_types=1);

namespace App\Core\Application\Command\Article;

class UpdateArticleCommand
{
    public function __construct(
        private readonly string $id,
        private readonly array $data,
    ) {}

    public function getId(): string
    {
        return $this->id;
    }

    public function getData(): array
    {
        return $this->data;
    }
}
