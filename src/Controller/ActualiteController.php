<?php

namespace App\Controller;

use App\Entity\Actualite;
use App\Form\ActualiteType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ActualiteController extends AbstractController
{
    #[Route('/actualites', name: 'app_actualites')]
    public function index(EntityManagerInterface $em): Response
    {
        $actualites = $em->getRepository(Actualite::class)->findBy([], ['datePublication' => 'DESC']);

        return $this->render('actualite/index.html.twig', [
            'actualites' => $actualites,
        ]);
    }

    #[Route('/actualites/ajouter', name: 'ajouter_actualite')]
    public function ajouter(Request $request, EntityManagerInterface $em): Response
    {
        $actualite = new Actualite();
        $form = $this->createForm(ActualiteType::class, $actualite);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
           $actualite->setDatePublication(new \DateTime());

            $em->persist($actualite);
            $em->flush();

            return $this->redirectToRoute('app_actualites');
        }

        return $this->render('actualite/ajouter.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
