<?php

declare(strict_types=1);

namespace App\Entity\Order;

interface OrderInterface
{
    public function getDeliverOn(): ?\DateTimeInterface;

    public function getAddress(): ?string;
}