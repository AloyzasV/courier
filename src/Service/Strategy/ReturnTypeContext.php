<?php

declare(strict_types=1);

namespace App\Service\Strategy;

use App\Service\GetOrdersListService;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function return(string $type): Response
    {
        $orders = $this->getOrdersListService->getOrdersForCourier();

        if (count($orders) == 0) {
            throw new NotFoundHttpException('No orders available');
        }

        $serializer = new Serializer([], [new XmlEncoder(), new JsonEncoder()]);

        foreach ($this->strategies as $strategy) {
            if ($strategy->isReturnable($type)) {
                return $strategy->return($orders, $serializer);
            }
        }

        throw new \InvalidArgumentException('Return type not found');
    }
}