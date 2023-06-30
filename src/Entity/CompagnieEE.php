<?php

namespace App\Entity;

use App\Repository\CompagnieEERepository;
use App\Service\ProprieteInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CompagnieEERepository::class)]
class CompagnieEE implements ProprieteInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private int $multiplicateur;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMultiplicateur(): ?int
    {
        return $this->multiplicateur;
    }

    public function setMultiplicateur(int $multiplicateur): void
    {
        $this->multiplicateur = $multiplicateur;
    }

    public function getNom(): string
    {
        return 'CompagnieEE';
    }

    public function getType(): string
    {
        return 'Compagnie';
    }
}
