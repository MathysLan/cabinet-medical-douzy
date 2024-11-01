<?php

namespace App\Controller;

use App\Entity\Actualite;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(EntityManagerInterface $em): Response
    {
        $actualites = $em->getRepository(Actualite::class)->findBy([], ['datePublication' => 'DESC'], 5);

        return $this->render('home/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }
}
