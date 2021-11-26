<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Genre;
use App\Repository\GenreRepository;

class GenreController extends AbstractController
{
    /**
     * @Route("/genre", name="genre")
     */
    public function index(GenreRepository $repository): Response
    {
        $genres = $repository->findAll();
        return $this->render('genre/index.html.twig', [
            'genres' => $genres
        ]);
    }
}
