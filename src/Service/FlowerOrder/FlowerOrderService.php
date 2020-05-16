<?php

declare(strict_types=1);

namespace App\Service\FlowerOrder;

use App\Entity\Order\FlowerOrder;
use Doctrine\ORM\EntityManagerInterface;

class FlowerOrderService
{
    protected $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
    }

    public function createOrder(FlowerOrder $flowerOrder): void
    {
        $this->em->persist($flowerOrder);
        $this->em->flush();
    }
}
