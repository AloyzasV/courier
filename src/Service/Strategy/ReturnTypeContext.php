<?php

declare(strict_types=1);

namespace App\Service\Strategy;

class ReturnTypeContext
{
    private $strategies;

    public function addStrategy(ReturnTypeStrategyInterface $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    public function return(string $type): string
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->isReturnable($type)) {
                return $strategy->return();
            }
        }

        throw new \InvalidArgumentException('Return type not found');
    }
}