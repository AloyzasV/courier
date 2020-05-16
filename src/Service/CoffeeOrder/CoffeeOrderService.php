<?php

declare(strict_types=1);

namespace App\Service\CoffeeOrder;

use App\Entity\Order\CoffeeOrder;
use Doctrine\ORM\EntityManagerInterface;

class CoffeeOrderService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createOrder(CoffeeOrder $coffeeOrder): void
    {
        $this->em->persist($coffeeOrder);
        $this->em->flush();
    }
}
