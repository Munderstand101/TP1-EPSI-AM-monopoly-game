<?php

namespace App\Entity;

use App\Repository\TerrainRepository;
use App\Service\ProprieteInterface;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: TerrainRepository::class)]
class Terrain implements ProprieteInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(nullable: true)]
    private int $loyerSansMaison;

    #[ORM\Column(nullable: true)]
    private int $loyerAvec1Maison;

    #[ORM\Column(nullable: true)]
    private int $loyerAvec2Maisons;

    #[ORM\Column(nullable: true)]
    private int $loyerAvec3Maisons;

    #[ORM\Column(nullable: true)]
    private int $loyerAvec4Maisons;

    #[ORM\Column(nullable: true)]
    private int $loyerAvecHotel;

    #[ORM\Column(nullable: true)]
    private int $nombreMaisons;

    #[ORM\Column(nullable: true)]
    private bool $aHotel;

    public function getId(): ?int
    {
        return $this->id;
    }


    public function getLoyerSansMaison(): ?int
    {
        return $this->loyerSansMaison;
    }

    public function setLoyerSansMaison(int $loyerSansMaison): void
    {
        $this->loyerSansMaison = $loyerSansMaison;
    }

    public function getLoyerAvec1Maison(): ?int
    {
        return $this->loyerAvec1Maison;
    }

    public function setLoyerAvec1Maison(int $loyerAvec1Maison): void
    {
        $this->loyerAvec1Maison = $loyerAvec1Maison;
    }

    public function getLoyerAvec2Maisons(): ?int
    {
        return $this->loyerAvec2Maisons;
    }

    public function setLoyerAvec2Maisons(int $loyerAvec2Maisons): void
    {
        $this->loyerAvec2Maisons = $loyerAvec2Maisons;
    }

    public function getLoyerAvec3Maisons(): ?int
    {
        return $this->loyerAvec3Maisons;
    }

    public function setLoyerAvec3Maisons(int $loyerAvec3Maisons): void
    {
        $this->loyerAvec3Maisons = $loyerAvec3Maisons;
    }

    public function getLoyerAvec4Maisons(): ?int
    {
        return $this->loyerAvec4Maisons;
    }

    public function setLoyerAvec4Maisons(int $loyerAvec4Maisons): void
    {
        $this->loyerAvec4Maisons = $loyerAvec4Maisons;
    }

    public function getLoyerAvecHotel(): ?int
    {
        return $this->loyerAvecHotel;
    }

    public function setLoyerAvecHotel(int $loyerAvecHotel): void
    {
        $this->loyerAvecHotel = $loyerAvecHotel;
    }

    public function getNombreMaisons(): ?int
    {
        return $this->nombreMaisons;
    }

    public function setNombreMaisons(int $nombreMaisons): void
    {
        $this->nombreMaisons = $nombreMaisons;
    }

    public function hasHotel(): bool
    {
        return $this->aHotel;
    }

    public function setHotel(bool $hasHotel): void
    {
        $this->aHotel = $hasHotel;
    }

    public function getNom(): string
    {
        return 'Terrain';
    }

    public function getType(): string
    {
        return 'Propriété';
    }

}
