<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\CoffeeOrder;
use App\Service\CoffeeOrder\CoffeeOrderService;
use App\Form\CoffeeOrder\CoffeeOrderFormType;

class CoffeeOrderController extends AbstractController
{
    private $coffeeOrderService;

    public function __construct(CoffeeOrderService $coffeeOrderService)
    {
        $this->coffeeOrderService = $coffeeOrderService;
    }

    /**
     * @Route("/coffee", name="coffee")
     */
    public function orderAction(Request $request): Response
    {
        $form = $this->buildForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->coffeeOrderService->createOrder($form->getData());

            return $this->redirectToRoute('home_page');
        }

        return $this->render('coffee/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function buildForm(): FormInterface
    {
        $coffeeOrder = new CoffeeOrder();

        return $this->createForm(CoffeeOrderFormType::class, $coffeeOrder);
    }
}
