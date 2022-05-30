<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Rest\Article;

use App\Core\Application\Command\Article\DeleteArticleCommand;
use App\Core\Application\Command\Article\DeleteArticleHandler;
use App\Shared\Infrastructure\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class DeleteArticleAction extends AbstractController
{
    public function __construct(
        private readonly DeleteArticleHandler $deleteArticleHandler,
    ) {}

    public function __invoke(Request $request, string $id): ApiResponse
    {
        $command = new DeleteArticleCommand($id);
        $this->deleteArticleHandler->handle($command);

        return new ApiResponse();
    }
}
