<?php

namespace App\Entity;

use App\Repository\GareRepository;
use App\Service\ProprieteInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GareRepository::class)]
class Gare implements ProprieteInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private int $loyer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLoyer(): ?int
    {
        return $this->loyer;
    }

    public function setLoyer(int $loyer): void
    {
        $this->loyer = $loyer;
    }

    public function getNom(): string
    {
        return 'Gare';
    }

    public function getType(): string
    {
        return 'Propriété';
    }
}
