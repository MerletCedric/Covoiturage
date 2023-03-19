<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\TrajetRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Trajet;

class TrajetController extends AbstractController
{
    /**
    * Index des trajets
    * @Route("/trajet", name="trajet")
    * @return Response
    */
    public function index(): Response
    {
        return $this->render('trajet/index.html.twig');
    }
    /**
     * Lister tous les trajets
     * @Route("/trajet/list", name="trajet.list")
     * @return Response
     */
    public function list(): Response
    {
        $trajets = $this->getDoctrine()->getRepository(Trajet::class)->findAll();
        return $this->render('trajet/list.html.twig', [
            'trajets' => $trajets,
        ]);
    }
    /**
    * Chercher et afficher un stage.
    * @Route("/trajet/{id}", name="trajet.show", requirements={"id" = "\d+"})
    * @param Stage $stage
    * @return Response
    */
    public function show(Trajet $trajet) : Response
    {
        return $this->render('trajet/show.html.twig', [
            'trajet' => $trajet,
        ]);
    }
}
