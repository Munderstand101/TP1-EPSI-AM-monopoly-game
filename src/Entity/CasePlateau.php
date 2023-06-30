<?php

namespace App\Entity;

use App\Repository\CasePlateauRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CasePlateauRepository::class)]
class CasePlateau
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\Column(type: 'string')]
    private ?string $nom = null;

    #[ORM\Column(type: 'integer', nullable: true)]
    private ?int $position = null;

    #[ORM\ManyToOne(targetEntity: Plateau::class, inversedBy: 'cases')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Plateau $plateau = null;

    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): void
    {
        $this->nom = $nom;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): void
    {
        $this->position = $position;
    }

    public function getPlateau(): ?Plateau
    {
        return $this->plateau;
    }

    public function setPlateau(?Plateau $plateau): void
    {
        $this->plateau = $plateau;
    }
}
