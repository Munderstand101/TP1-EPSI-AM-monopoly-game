<?php

namespace App\Controller;

use App\Service\Banque;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private EntityManagerInterface $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    #[Route("/", name: "default")]
    public function index(): Response
    {
        $banque = Banque::getInstance();
        $banque->ajouterArgent(100);
        $solde = $banque->getSolde();

        return $this->render('default/index.html.twig', [
            'solde' => $solde,
        ]);
    }
}
