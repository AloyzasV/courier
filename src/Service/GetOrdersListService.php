<?php

declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\EntityManagerInterface;
use App\Repository\CoffeeOrderRepository;
use App\Repository\FlowerOrderRepository;
use Doctrine\Common\Collections\ArrayCollection;
use App\Service\CoordinatesToAddressService;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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

    public function getOrdersForCourier(): ?Array
    {
        $allOrders = $this->getAllOrders();

        if (count($allOrders) == 0 ) {
            throw new NotFoundHttpException('No orders available');
        }

        foreach($allOrders as $order) {
            $orders[] = [
                'deliverTo' => $order->getDeliveryAddress($this->coordinatesService),
                'deliverOn' => $order->getDeliverOn()->format('Y-m-d H:i'),
            ];
        }

        usort($orders, function ($order1, $order2) {
            return $order1['deliverOn'] <=> $order2['deliverOn'];
        });
        
        return $orders;
    }
}