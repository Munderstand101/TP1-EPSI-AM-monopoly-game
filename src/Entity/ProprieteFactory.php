<?php

namespace App\Entity;

use App\Service\ProprieteInterface;
use App\Entity\Terrain;
use App\Entity\Gare;
use App\Entity\CompagnieEE;

class ProprieteFactory
{
    public static function createPropriete(string $type): ProprieteInterface
    {
        switch ($type) {
            case 'Terrain':
                return new Terrain();
            case 'Gare':
                return new Gare();
            case 'CompagnieEE':
                return new CompagnieEE();
            default:
                throw new \InvalidArgumentException("Type de propriété invalide.");
        }
    }
}
