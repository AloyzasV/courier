<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class CoffeeOrderController extends AbstractController
{
    /**
     * @Route("/coffee", name="coffee")
     */
    public function index()
    {
        return $this->render('coffee/index.html.twig', [
            'controller_name' => 'CoffeOrderController',
        ]);
    }
}
