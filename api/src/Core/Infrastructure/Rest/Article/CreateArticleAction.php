<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Rest\Article;

use App\Core\Application\Command\Article\CreateArticleCommand;
use App\Core\Application\Command\Article\CreateArticleHandler;
use App\Shared\Infrastructure\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class CreateArticleAction extends AbstractController
{
    public function __construct(
        private readonly CreateArticleHandler $createArticleHandler,
    ) {}

    public function __invoke(Request $request): ApiResponse
    {
        $command = new CreateArticleCommand($request->toArray());
        $id = $this->createArticleHandler->handle($command);

        return new ApiResponse(['id' => $id]);
    }
}
