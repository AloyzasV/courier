<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use Symfony\Component\Serializer\Serializer;

class JsonStrategy implements ReturnTypeStrategyInterface
{
    private const TYPE = 'json';


    public function isReturnable(string $type): bool
    {
        return self::TYPE === $type;
    }

    public function return(Array $orders, Serializer $serializer): string
    {
        return $serializer->serialize($orders, self::TYPE);
    }
}