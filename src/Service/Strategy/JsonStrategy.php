<?php

declare(strict_types=1);

namespace App\Service\Strategy;

class JsonStrategy implements ReturnTypeStrategyInterface
{
    private const TYPE = 'json';


    public function isReturnable(string $type): bool
    {
        return self::TYPE === $type;
    }

    public function return(): string
    {
        return 'return json response';
    }
}