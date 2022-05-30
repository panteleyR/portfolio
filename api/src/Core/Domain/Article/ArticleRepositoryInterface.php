<?php

declare(strict_types=1);

namespace App\Core\Domain\Article;

interface ArticleRepositoryInterface
{
    public function getById(string $id): Article;
    public function getAll(): array;
    public function add(Article $article): string;
    public function update(Article $article): void;
    public function delete(string $id): void;
}
