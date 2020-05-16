<?php

declare(strict_types=1);

namespace App\Service\Strategy;

class XmlStrategy implements ReturnTypeStrategyInterface
{
    private const TYPE = 'xml';

    public function isReturnable(string $type): bool
    {
        return self::TYPE === $type;
    }

    public function return(): string
    {
        return 'return xml response';
    }
}