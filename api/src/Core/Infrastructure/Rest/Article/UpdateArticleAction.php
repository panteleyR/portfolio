<?php

declare(strict_types=1);

namespace App\Core\Infrastructure\Rest\Article;

use App\Core\Application\Command\Article\UpdateArticleCommand;
use App\Core\Application\Command\Article\UpdateArticleHandler;
use App\Shared\Infrastructure\ApiResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class UpdateArticleAction extends AbstractController
{
    public function __construct(
        private readonly UpdateArticleHandler $updateArticleHandler,
    ) {}

    public function __invoke(Request $request, string $id): ApiResponse
    {
        $command = new UpdateArticleCommand($id, $request->toArray());
        $this->updateArticleHandler->handle($command);

        return new ApiResponse();
    }
}
