<?php

namespace App\Entity;

use App\Repository\CampagneRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CampagneRepository::class)]
class Campagne
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?\DateTime $dateDebutAt = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTime $dateFinAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getDateDebutAt(): ?\DateTime
    {
        return $this->dateDebutAt;
    }

    public function setDateDebutAt(\DateTime $dateDebutAt): static
    {
        $this->dateDebutAt = $dateDebutAt;

        return $this;
    }

    public function getDateFinAt(): ?\DateTime
    {
        return $this->dateFinAt;
    }

    public function setDateFinAt(?\DateTime $dateFinAt): static
    {
        $this->dateFinAt = $dateFinAt;

        return $this;
    }
}
