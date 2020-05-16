<?php

namespace App\Entity\Order;

use App\Repository\CoffeeOrderRepository;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;

/**
 * @ORM\Entity(repositoryClass=CoffeeOrderRepository::class)
 */
class CoffeeOrder implements OrderInterface
{
    use TimestampableEntity;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="boolean", options={"default":"0"})
     */
    private $milk;

    /**
     * @ORM\ManyToOne(targetEntity=App\Entity\MilkType::class)
     */
    private $milkType;

    /**
     * @ORM\ManyToOne(targetEntity=App\Entity\CupSize::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $cupSize;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMilk(): ?bool
    {
        return $this->milk;
    }

    public function setMilk(bool $milk): self
    {
        $this->milk = $milk;

        return $this;
    }

    public function getMilkType(): ?MilkType
    {
        return $this->milkType;
    }

    public function setMilkType(?MilkType $milkType): self
    {
        $this->milkType = $milkType;

        return $this;
    }

    public function getCupSize(): ?CupSize
    {
        return $this->cupSize;
    }

    public function setCupSize(?CupSize $cupSize): self
    {
        $this->cupSize = $cupSize;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getDeliverOn(): ?\DateTimeInterface
    {
        return $this->createdAt->modify("+30 minutes");
    }

    public function getAddress(): ?string
    {
        return $this->location;
    }
}
