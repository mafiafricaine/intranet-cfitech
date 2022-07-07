<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\Stagiaire;
use App\Repository\StagiaireRepository;
use Doctrine\Persistence\ManagerRegistry;
use App\Form\StagiaireType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class StagiaireController extends AbstractController
{
    /**
     * @Route("/stagiaire", name="app_stagiaire")
     */
    public function index(StagiaireRepository $repo): Response
    {
        return $this->render('stagiaire/index.html.twig', ['stagiaires' => $repo->findAll()]);
    }

    /**
     * @Route("/stagiaire/{id<[0-9]+>}", name="app_stagiaire_show", methods="GET")
     */
    public function show(Stagiaire $stagiaire): Response
    {
        return $this->render('stagiaire/show.html.twig', compact('stagiaire'));
    }

     /**
     * @Route("/stagiaire/create", name="app_stagiaire_create", methods= {"GET","POST"})
     */
    public function create(Request $request, EntityManagerInterface $em): Response
    {
        $stagiaire = new Stagiaire;
        $form = $this->createForm(StagiaireType::class, $stagiaire);
        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            //$pin->setUser($this->getUser());
            $em->persist($stagiaire);
            $em->flush();
            $this->addFlash('success', 'Stagiaire pré-inscrit !');
            return $this->redirectToRoute('app_stagiaire');
        }
        return $this->render('stagiaire/create.html.twig', ['monForm' => $form->createView()]);
    }

    



    /**
     * @Route("/stagiaire/{id<[0-9]+>}/edit", name="app_stagiaire_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Stagiaire $stagiaire, EntityManagerInterface $em): Response
    {
        $form = $this->createForm(StagiaireType::class, $stagiaire);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->flush();
            $this->addFlash('success', 'Stagiaire bien mise à jour !'); 
            return $this->redirectToRoute('app_stagiaire');
        }

        return $this->render('stagiaire/edit.html.twig', [
            'stagiaire' => $stagiaire,
            'monForm' => $form->createView()
        ]);
    }

    /**
     * @Route("/stagiaire/{id<[0-9]+>}/delete", name="app_stagiaire_delete")
     */
    public function delete(Stagiaire $stagiaire, EntityManagerInterface $em): Response
    {
        $em->remove($stagiaire);
        $em->flush();
        $this->addFlash('info', 'Stagiaire bien supprimé !'); 
        return $this->redirectToRoute('app_stagiaire');
    }
}
