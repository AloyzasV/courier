<?php

namespace App\Entity\Order;

use App\Repository\FlowerOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use App\Service\CoordinatesToAddressService;

/**
 * @ORM\Entity(repositoryClass=FlowerOrderRepository::class)
 */
class FlowerOrder implements OrderInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $address;

    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\NotBlank
     */
    private $name;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank
     * @Assert\DateTime(format="Y-m-d H:i")
     */
    private $deliverOn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getDeliverOn(): ?\DateTimeInterface
    {
        return $this->deliverOn;
    }

    public function setDeliverOn(string $deliverOn): self
    {
        $this->deliverOn = \DateTime::createFromFormat('Y-m-d H:i', $deliverOn);;

        return $this;
    }

    public function getDeliveryAddress(CoordinatesToAddressService $coordinatesService): ?string
    {
        return $this->address;
    }
}
