<?php

declare(strict_types=1);

namespace App\Core\Domain\Article;

use App\Shared\Domain\ModelTrait;
use DateTime;

class Article
{
    use ModelTrait;

    public function __construct(
        private string $title,
        private string $description,
        private string $text,
        private null|string $id = null,
        private DateTime $createdAt = new DateTime(),
        private DateTime $updatedAt = new DateTime(),
    ) {}

    public function getId(): ?string
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getText(): string
    {
        return $this->text;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function setDescription(string $description): void
    {
        $this->description = $description;
    }

    public function setText(string $text): void
    {
        $this->text = $text;
    }

    public function setId(?string $id): void
    {
        $this->id = $id;
    }

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTime $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTime $updatedAt): void
    {
        $this->updatedAt = $updatedAt;
    }
}
