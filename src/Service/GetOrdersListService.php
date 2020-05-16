<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CoffeeOrderRepository;
use App\Repository\FlowerOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;

class GetOrdersListService
{
    protected $em;
    private $coffeeOrderRepository;
    private $flowerOrderRepository;

    public function __construct(
        EntityManagerInterface $em, 
        CoffeeOrderRepository $coffeeOrderRepository, 
        FlowerOrderRepository $flowerOrderRepository
    ) {
        $this->em = $em;
        $this->coffeeOrderRepository = $coffeeOrderRepository;
        $this->flowerOrderRepository = $flowerOrderRepository;
    }

    public function getOrders(): ArrayCollection
    {
        $coffeeOrders = $this->coffeeOrderRepository->findAll();
        $flowerOrders = $this->flowerOrderRepository->findAll();

        $orders = new ArrayCollection(
            array_merge($coffeeOrders, $flowerOrders)
        );

        return $orders;
    }
}