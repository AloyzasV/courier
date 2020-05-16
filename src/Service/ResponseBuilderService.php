<?php

declare(strict_types=1);

namespace App\Service;

use Symfony\Component\HttpFoundation\Response;

class ResponseBuilderService
{
    public function build(string $content, string $contentType): Response
    {
        $response = new Response();
        $response->setContent($content);
        $response->setStatusCode(Response::HTTP_OK);
        $response->headers->set('Content-Type', $contentType);
        
        return $response;
    }
}
