<?php

namespace App\Entity;

use App\Repository\ModePaimentRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ModePaimentRepository::class)]
class ModePaiment
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $IsLibre = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isLibre(): ?bool
    {
        return $this->IsLibre;
    }

    public function setIsLibre(bool $IsLibre): static
    {
        $this->IsLibre = $IsLibre;

        return $this;
    }
}
