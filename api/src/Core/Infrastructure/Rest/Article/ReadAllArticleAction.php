<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Rest\Article;

use App\Core\Application\Command\Article\ReadAllArticleHandler;
use App\Core\Domain\Article\Article;
use App\Shared\Infrastructure\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ReadAllArticleAction extends AbstractController
{
    public function __construct(
        private readonly ReadAllArticleHandler $readAllArticleHandler,
    ) {}

    public function list(): ApiResponse
    {
        $list = $this->readAllArticleHandler->handle();

        foreach ($list as &$article) {
            /** @var Article $article */
            $article = $article->toArray();
        }

        return new ApiResponse($list);
    }
}
