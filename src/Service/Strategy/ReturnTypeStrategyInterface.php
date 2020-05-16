<?php

declare(strict_types=1);

namespace App\Service\Strategy;

interface ReturnTypeStrategyInterface
{
    public function isReturnable(string $type): bool;

    public function return(): string;
}