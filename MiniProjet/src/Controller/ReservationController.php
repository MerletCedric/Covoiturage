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
}
