<?php

namespace App\Entity;

use App\Repository\CoffeeOrderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CoffeeOrderRepository::class)
 */
class CoffeeOrder
{
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
     * @ORM\ManyToOne(targetEntity=MilkType::class)
     */
    private $milkType;

    /**
     * @ORM\ManyToOne(targetEntity=CupSize::class)
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
}
