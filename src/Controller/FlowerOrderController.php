<?php

declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Entity\Order\FlowerOrder;
use App\Service\FlowerOrder\FlowerOrderService;
use App\Form\FlowerOrder\FlowerOrderFormType;

class FlowerOrderController extends AbstractController
{
    private $flowerOrderService;

    public function __construct(FlowerOrderService $flowerOrderService)
    {
        $this->flowerOrderService = $flowerOrderService;
    }

    /**
     * @Route("/flower", name="flower")
     */
    public function orderAction(Request $request): Response
    {
        $form = $this->buildForm();
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            return $this->handleFormSubmit($form);
        }

        return $this->render('flower/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    private function buildForm(): FormInterface
    {
        $flowerOrder = new FlowerOrder();

        return $this->createForm(FlowerOrderFormType::class, $flowerOrder);
    }

    private function handleFormSubmit(FormInterface $form): Response
    {
        $this->flowerOrderService->createOrder($form->getData());
        $this->addFlash('success', 'Order successfully submitted');

        return $this->redirectToRoute('home_page');
    }
}
