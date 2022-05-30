<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Rest\Article;

use App\Core\Application\Command\Article\ReadArticleCommand;
use App\Core\Application\Command\Article\ReadArticleHandler;
use App\Shared\Infrastructure\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class ReadArticleAction extends AbstractController
{
    public function __construct(
        private readonly ReadArticleHandler $readArticleHandler,
    ) {}

    public function __invoke(Request $request, string $id): ApiResponse
    {
        $command = new ReadArticleCommand($id);
        $article = $this->readArticleHandler->handle($command);

        return new ApiResponse($article->toArray());
    }
}
