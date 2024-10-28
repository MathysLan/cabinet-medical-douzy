<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ServicesController extends AbstractController
{
    #[Route('/services', name: 'app_services')]
    public function index(): Response
    {
        return $this->render('services/index.html.twig');
    }

    #[Route('/services/medecin', name: 'app_services_medecin')]
    public function medecin(): Response
    {
        return $this->render('services/medecin.html.twig');
    }

    #[Route('/services/infirmiere', name: 'app_services_infirmiere')]
    public function infirmiere(): Response
    {
        return $this->render('services/infirmiere.html.twig');
    }

    #[Route('/services/orthophoniste', name: 'app_services_orthophoniste')]
    public function orthophoniste(): Response
    {
        return $this->render('services/orthophoniste.html.twig');
    }

    #[Route('/services/psychologue', name: 'app_services_psychologue')]
    public function psychologue(): Response
    {
        return $this->render('services/psychologue.html.twig');
    }

    #[Route('/services/dentiste', name: 'app_services_dentiste')]
    public function dentiste(): Response
    {
        return $this->render('services/dentiste.html.twig');
    }
}
