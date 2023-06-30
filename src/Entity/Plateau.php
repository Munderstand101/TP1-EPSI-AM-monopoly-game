<?php

namespace App\Entity;

use App\Repository\PlateauRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Exception as ExceptionAlias;
use Traversable;

#[ORM\Entity(repositoryClass: PlateauRepository::class)]
class Plateau implements \IteratorAggregate
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private ?int $id = null;

    #[ORM\OneToMany(mappedBy: 'plateau', targetEntity: CasePlateau::class)]
    private Collection $cases;

    public function __construct()
    {
        $this->cases = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection
     */
    public function getCases(): Collection
    {
        return $this->cases;
    }

    public function addCase(CasePlateau $case): void
    {
        if (!$this->cases->contains($case)) {
            $this->cases[] = $case;
            $case->setPlateau($this);
        }
    }

    public function removeCase(CasePlateau $case): void
    {
        if ($this->cases->contains($case)) {
            $this->cases->removeElement($case);
            // set the owning side to null (unless already changed)
            if ($case->getPlateau() === $this) {
                $case->setPlateau(null);
            }
        }
    }

    /**
     * @return Traversable
     * @throws ExceptionAlias
     */
    public function getIterator(): \Traversable
    {
        return $this->cases->getIterator();
    }
}
