<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\GetOrdersListService;

class GetOrderListController extends AbstractController
{
    private $getOrdersListService;

    public function __construct(GetOrdersListService $getOrdersListService)
    {
        $this->getOrdersListService = $getOrdersListService;
    }
    /**
     * @Route("/get-order-list", name="get_order_list")
     */
    public function getOrderList()
    {
        $this->getOrdersListService->getOrders();
    }
}
