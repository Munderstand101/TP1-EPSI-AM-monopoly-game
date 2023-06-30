<?php

namespace App\Service;

class Banque
{
    private static ?Banque $instance = null;
    private float $solde;

    private function __construct()
    {
        $this->solde = 0;
    }

    public static function getInstance(): Banque
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function getSolde(): float
    {
        return $this->solde;
    }

    public function ajouterArgent(float $montant): void
    {
        $this->solde += $montant;
    }

    public function retirerArgent(float $montant): void
    {
        if ($montant <= $this->solde) {
            $this->solde -= $montant;
        } else {
            throw new \Exception("Solde insuffisant dans la banque.");
        }
    }
}
