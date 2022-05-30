<?php

declare(strict_types=1);

namespace App\Shared\Infrastructure;

use Symfony\Component\HttpFoundation\JsonResponse;

class ApiResponse extends JsonResponse
{
    public function __construct(array $data = [], string $message = 'Ok', int $status = 200, array $headers = [], bool $json = false)
    {
        $responseData['data'] = $data;
        $responseData['status'] = $status;
        $responseData['message'] = $message;
        parent::__construct($responseData, $status, $headers, $json);
    }
}
