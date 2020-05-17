<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\Strategy\ReturnTypeContext;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

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
        try {
            return $this->returnTypeContext->return($type);
        } catch (NotFoundHttpException | \InvalidArgumentException $e) {
            $this->addFlash('error', $e->getMessage());

            return $this->redirectToRoute('home_page');
        }
    }
}
