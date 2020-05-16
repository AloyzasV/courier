<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\HttpFoundation\Response;

interface ReturnTypeStrategyInterface
{
    public function isReturnable(string $type): bool;

    public function return(Array $orders, Serializer $serializer): Response;
}