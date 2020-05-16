<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use Symfony\Component\Serializer\Serializer;
use App\Service\ResponseBuilderService;
use Symfony\Component\HttpFoundation\Response;

class XmlStrategy implements ReturnTypeStrategyInterface
{
    private const TYPE = 'xml';
    private $responseBuilderService;

    public function __construct(ResponseBuilderService $responseBuilderService)
    {
        $this->responseBuilderService = $responseBuilderService;
    }

    public function isReturnable(string $type): bool
    {
        return self::TYPE === $type;
    }

    public function return(Array $orders, Serializer $serializer): Response
    {
        return $this->responseBuilderService->build(
            $serializer->serialize($orders, self::TYPE),
            'text/xml'
        );
    }
}