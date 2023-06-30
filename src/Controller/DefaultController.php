<?php

namespace App\Controller;

use App\Entity\CasePlateau;
use App\Entity\Joueur;
use App\Entity\Plateau;
use App\Entity\ProprieteFactory;
use App\Repository\JoueurRepository;
use App\Service\Banque;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private EntityManagerInterface $entityManager;
    private ProprieteFactory $proprieteFactory;
    private JoueurRepository $joueurRepository;

    public function __construct(EntityManagerInterface $entityManager, ProprieteFactory $proprieteFactory, JoueurRepository $joueurRepository)
    {
        $this->entityManager = $entityManager;
        $this->proprieteFactory = $proprieteFactory;
        $this->joueurRepository = $joueurRepository;
    }

    #[Route("/", name: "default")]
    public function index(): Response
    {


        ///Partie 1
        $banque = Banque::getInstance();
        $banque->ajouterArgent(100);
        $solde = $banque->getSolde();

        ///Partie 2
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


        ///Partie 3
        // Créer une instance Plateau
        $plateau = new Plateau();

        // Créer des instances CasePlateau
        $case1 = new CasePlateau();
        $case1->setNom('Case 1');
        $case1->setPlateau($plateau);

        $case2 = new CasePlateau();
        $case2->setNom('Case 2');
        $case2->setPlateau($plateau);

        // Ajouter des caisses au plateau
        $plateau->addCase($case1);
        $plateau->addCase($case2);

        // Obtenez les cas du plateau
        $cases = $plateau->getCases();

        /// Partie 4 et 5 ...
        // Créer un joueur
        $joueur = new Joueur();
        $joueur->setNom('John Doe');
        $joueur->setArgent(200);



        // Persister l'entité joueur
        $this->entityManager->persist($joueur);
        $this->entityManager->flush();


        // Récupérer tous les joueurs
        $joueurs = $this->joueurRepository->findAll();


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

            'cases' => $cases,

            'joueurs' => $joueurs,
        ]);
    }
}
