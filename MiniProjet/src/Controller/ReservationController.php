<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reservation;

class ReservationController extends AbstractController
{
    /**
    * Index des reservations
    * @Route("/reservation", name="reservation")
    * @return Response
    */
    public function index(): Response
    {
        return $this->render('reservation/index.html.twig');
    }
    /**
     * Lister tous les reservations
     * @Route("/reservation/list", name="reservation.list")
     * @return Response
     */
    public function list(): Response
    {
        $reservations = $this->getDoctrine()->getRepository(Reservation::class)->findAll();
        return $this->render('reservation/list.html.twig', [
            'reservations' => $reservations,
        ]);
    }
    /**
    * Chercher et afficher un stage.
    * @Route("/reservation/{id}", name="stage.show", requirements={"id" = "\d+"})
    * @param Stage $stage
    * @return Response
    */
    public function show(Reservation $reservation) : Response
    {
        return $this->render('reservation/show.html.twig', [
            'reservation' => $reservation,
        ]);
    }
}
