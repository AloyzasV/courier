<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Strategy\ReturnTypeContext;
use Symfony\Component\HttpFoundation\Response;

class GetOrderListController extends AbstractController
{
    public function __construct(ReturnTypeContext $returnTypeContext)
    {
        $this->returnTypeContext = $returnTypeContext;
    }

    /**
     * @Route("/get-order-list/{type}", name="get_order_list")
     */
    public function getOrderList(string $type): Response
    {
        $this->returnTypeContext->return($type);
      //return new Response());
    }
}
