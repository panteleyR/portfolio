<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\DB;

use App\Core\Domain\Article\Article;
use App\Core\Domain\Article\ArticleRepositoryInterface;
use Doctrine\DBAL\Connection;
use Doctrine\DBAL\Exception;

class ArticleRepository implements ArticleRepositoryInterface
{
    public function __construct(
        private readonly Connection $connection,
    ){}

    /**
     * @throws Exception
     */
    public function getById(string $id): Article
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->select('*')->from('Article')->where('id = :id');
        $qb->setParameter('id', $id);
        $articleData = $qb->fetchAssociative();
        $articleData['id'] = (string) $articleData['id'];
        $articleData['createdAt'] = new \DateTime($articleData['createdAt']);
        $articleData['updatedAt'] = new \DateTime($articleData['updatedAt']);
        $article = new Article(...$articleData);

        return new Article(...$articleData);
    }

    /**
     * @throws Exception
     */
    public function getAll(): array
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->select('*')->from('Article');
        $articleList = $qb->fetchAllAssociative();

        foreach ($articleList as &$articleData) {
            $articleData['id'] = (string) $articleData['id'];
            $articleData['createdAt'] = new \DateTime($articleData['createdAt']);
            $articleData['updatedAt'] = new \DateTime($articleData['updatedAt']);
            $articleData = new Article(...$articleData);
        }

        return $articleList;
    }

    /**
     * @throws Exception
     */
    public function add(Article $article): string
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->insert('Article')->values([
            'title' => ':title',
            'description' => ':description',
            'text' => ':text',
            'createdAt' => ':createdAt',
            'updatedAt' => ':updatedAt',
        ]);
        $qb->setParameters([
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'text' => $article->getText(),
            'createdAt' => $article->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $article->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
        $qb->executeStatement();

        return $this->connection->lastInsertId();
    }

    /**
     * @throws Exception
     */
    public function update(Article $article): void
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->update('Article')
            ->set('title', ':title',)
            ->set('description', ':description',)
            ->set('text', ':text',)
            ->set('createdAt', ':createdAt',)
            ->set('updatedAt', ':updatedAt',)
            ->where('id = :id');
        $qb->setParameters([
            'title' => $article->getTitle(),
            'description' => $article->getDescription(),
            'text' => $article->getText(),
            'id' => $article->getId(),
            'createdAt' => $article->getCreatedAt()->format('Y-m-d H:i:s'),
            'updatedAt' => $article->getUpdatedAt()->format('Y-m-d H:i:s'),
        ]);
        $qb->executeStatement();
    }

    /**
     * @throws Exception
     */
    public function delete(string $id): void
    {
        $qb = $this->connection->createQueryBuilder();
        $qb->delete('Article')
            ->where('id = :id')
            ->setParameter('id', $id);
        $qb->executeStatement();
    }
}
