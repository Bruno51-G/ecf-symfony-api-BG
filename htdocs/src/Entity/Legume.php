<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\LegumeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: LegumeRepository::class)]
#[ApiResource]
class Legume
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 32)]
    private ?string $name = null;

    #[ORM\Column(length: 64)]
    private ?string $variety = null;

    #[ORM\Column(length: 50)]
    private ?string $primaryColor = null;

    #[ORM\Column]
    private ?int $lifeTime = null;

    #[ORM\Column]
    private ?float $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getVariety(): ?string
    {
        return $this->variety;
    }

    public function setVariety(string $variety): static
    {
        $this->variety = $variety;

        return $this;
    }

    public function getPrimaryColor(): ?string
    {
        return $this->primaryColor;
    }

    public function setPrimaryColor(string $primaryColor): static
    {
        $this->primaryColor = $primaryColor;

        return $this;
    }

    public function getLifeTime(): ?int
    {
        return $this->lifeTime;
    }

    public function setLifeTime(int $lifeTime): static
    {
        $this->lifeTime = $lifeTime;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): static
    {
        $this->price = $price;

        return $this;
    }
}
