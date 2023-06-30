<?php

namespace App\Controller;

use App\Entity\ProprieteFactory;
use App\Service\Banque;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager,ProprieteFactory $proprieteFactory)
    {
        $this->entityManager = $entityManager;
        $this->proprieteFactory = $proprieteFactory;

    }

    #[Route("/", name: "default")]
    public function index(): Response
    {
        $banque = Banque::getInstance();
        $banque->ajouterArgent(100);
        $solde = $banque->getSolde();


        // Créer une instance de Terrain
        $terrain = $this->proprieteFactory->createPropriete('Terrain');
        $terrain->setLoyerSansMaison(100);
        $terrain->setLoyerAvec1Maison(200);

        // Créer une instance de CompagnieEE
        $compagnieEE = $this->proprieteFactory->createPropriete('CompagnieEE');
        $compagnieEE->setMultiplicateur(2);

        // Créer une instance de Gare
        $gare = $this->proprieteFactory->createPropriete('Gare');
        $gare->setLoyer(50);

        // Utiliser les méthodes des propriétés
        $terrainNom = $terrain->getNom();
        $terrainType = $terrain->getType();
        $terrainLoyerSansMaison = $terrain->getLoyerSansMaison();

        $compagnieEENom = $compagnieEE->getNom();
        $compagnieEEType = $compagnieEE->getType();
        $compagnieEEMultiplicateur = $compagnieEE->getMultiplicateur();



        return $this->render('default/index.html.twig', [
            'solde' => $solde,

            'terrainNom' => $terrainNom,
            'terrainType' => $terrainType,
            'terrainLoyerSansMaison' => $terrainLoyerSansMaison,

            'compagnieEENom' => $compagnieEENom,
            'compagnieEEType' => $compagnieEEType,
            'compagnieEEMultiplicateur' => $compagnieEEMultiplicateur,

            'gareNom' => $gare->getNom(),
            'gareType' => $gare->getType(),
            'gareLoyer' => $gare->getLoyer(),

        ]);
    }
}
