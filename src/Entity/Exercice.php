<?php

namespace App\Entity;

use App\Repository\ExerciceRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ExerciceRepository::class)]
class Exercice
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?\DateTime $DateDebutAt = null;

    #[ORM\Column]
    private ?\DateTime $dateFinAt = null;

    #[ORM\Column]
    private ?\DateTime $dateLimiteAt = null;

    #[ORM\Column]
    private ?\DateTime $dateRetributionAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateDebutAt(): ?\DateTime
    {
        return $this->DateDebutAt;
    }

    public function setDateDebutAt(\DateTime $DateDebutAt): static
    {
        $this->DateDebutAt = $DateDebutAt;

        return $this;
    }

    public function getDateFinAt(): ?\DateTime
    {
        return $this->dateFinAt;
    }

    public function setDateFinAt(\DateTime $dateFinAt): static
    {
        $this->dateFinAt = $dateFinAt;

        return $this;
    }

    public function getDateLimiteAt(): ?\DateTime
    {
        return $this->dateLimiteAt;
    }

    public function setDateLimiteAt(\DateTime $dateLimiteAt): static
    {
        $this->dateLimiteAt = $dateLimiteAt;

        return $this;
    }

    public function getDateRetributionAt(): ?\DateTime
    {
        return $this->dateRetributionAt;
    }

    public function setDateRetributionAt(\DateTime $dateRetributionAt): static
    {
        $this->dateRetributionAt = $dateRetributionAt;

        return $this;
    }
}
