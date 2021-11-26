<?php

namespace App\Controller;

use App\Entity\Movie;
use App\Form\MovieType;
use App\Repository\MovieRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Actor;

class MovieController extends AbstractController
{
    /**
     * @Route("/movie", name="movie")
     */
    public function index(MovieRepository $repository): Response
    {
        $movies = $repository->findAll();
        return $this->render('movie/index.html.twig', [
            'movies' => $movies
        ]);
    }

    /**
     * @Route("/affichecasting/{id}", name="affichecasting")
     */
    public function AfficherLeCasting(MovieRepository $mr,$id): Response
    {
        $movie = $mr->find($id);
        $actors= $movie->getActeurs();
        return $this->render('movie/afficherCasting.html.twig', [
            'movie' => $movie,'$actors'=>$actors
        ]);
    }

    /**
     * @Route("/ajouterfilm", name="ajouterfilm")
     */
    public function ajouterFilm(Movie $movie=null, Request $request, EntityManagerInterface $em) {

        if(!$movie){
            $movie= new Movie();
        }

        $form = $this->createForm(MovieType::class,$movie);

        $form->handleRequest($request);
        if ($form->isSubmitted()){
            
            $em->persist($movie);
            $em->flush();
            return $this->redirectToRoute('movie');
        }
        return $this->render('movie/modifierMovie.html.twig',["form"=>$form->createView()]);
    }
}

