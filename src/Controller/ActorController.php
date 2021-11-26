<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Actor;
use App\Repository\ActorRepository;
use App\Form\ActorType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\ORM\EntityManagerInterface;

class ActorController extends AbstractController
{
    /**
     * @Route("/actor", name="actor")
     */
    public function index(ActorRepository $repository): Response
    {
      //  $repository = $this->getDoctrine()->getRepository(Actor::class);
        $actors = $repository->findAll();
        return $this->render('actor/index.html.twig', [
            'actors' => $actors
        ]);
    }

    /**
     * @Route("/afficheactor/{id}", name="afficheactor")
     */
    public function AfficherUnActeur(ActorRepository $ar,$id): Response
    {
        $actor = $ar->find($id);
        $movies = $actor->getMovies();
        return $this->render('actor/afficherUnActeur.html.twig', [
            'actor' => $actor, 'movies'=>$movies
        ]);
    }

    /**
     * @Route("/modifieractor/{id}", name="modifieractor")
     * @Route("/creationactor", name="creationactor")
     */
    public function modifierActor(Actor $actor=null, Request $request, EntityManagerInterface $em) {

        if(!$actor){
            $actor= new Actor();
        }

        $form = $this->createForm(ActorType::class,$actor);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            
            $em->persist($actor);
            $em->flush();
            return $this->redirectToRoute('actor');
        }
        return $this->render('actor/modifierActor.html.twig',["actor"=>$actor,"form"=>$form->createView()]);
    }


}
