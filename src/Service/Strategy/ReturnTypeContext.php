<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\Service\GetOrdersListService;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;

class ReturnTypeContext
{
    private $strategies;
    private $getOrdersListService;

    public function __construct(GetOrdersListService $getOrdersListService)
    {
        $this->getOrdersListService = $getOrdersListService;
    }

    public function addStrategy(ReturnTypeStrategyInterface $strategy): void
    {
        $this->strategies[] = $strategy;
    }

    public function return(string $type): string
    {
        $orders = $this->getOrdersListService->getOrdersForCourier();
        $serializer = new Serializer([], [new XmlEncoder(), new JsonEncoder()]);

        foreach ($this->strategies as $strategy) {
            if ($strategy->isReturnable($type)) {
                return $strategy->return($orders, $serializer);
            }
        }

        throw new \InvalidArgumentException('Return type not found');
    }
}