<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CoffeeOrderRepository;
use App\Repository\FlowerOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use App\Service\CoordinatesToAddressService;

class GetOrdersListService
{
    protected $em;
    private $coffeeOrderRepository;
    private $flowerOrderRepository;
    private $coordinatesService;

    public function __construct(
        EntityManagerInterface $em, 
        CoffeeOrderRepository $coffeeOrderRepository, 
        FlowerOrderRepository $flowerOrderRepository,
        CoordinatesToAddressService $coordinatesService
    ) {
        $this->em = $em;
        $this->coffeeOrderRepository = $coffeeOrderRepository;
        $this->flowerOrderRepository = $flowerOrderRepository;
        $this->coordinatesService = $coordinatesService;
    }

    public function getAllOrders(): ArrayCollection
    {
        $coffeeOrders = $this->coffeeOrderRepository->findAll();
        $flowerOrders = $this->flowerOrderRepository->findAll();

        $orders = new ArrayCollection(
            array_merge($coffeeOrders, $flowerOrders)
        );

        return $orders;
    }

    public function getOrdersForCourier(): Array
    {
        $allOrders = $this->getAllOrders();

        foreach($allOrders as $order) {
            $orders[] = [
                'deliverTo' => $order->getAddress($this->coordinatesService),
                'deliverOn' => $order->getDeliverOn()->format('Y-m-d H:i'),
            ];
        }

        return $orders;
    }
}