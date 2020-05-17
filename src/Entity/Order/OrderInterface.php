<?php

declare(strict_types=1);

namespace App\Entity\Order;

use App\Service\CoordinatesToAddressService;

interface OrderInterface
{
    public function getDeliverOn(): ?\DateTimeInterface;

    public function getDeliveryAddress(CoordinatesToAddressService $coordiantesService): ?string;
}