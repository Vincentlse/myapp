<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Director;
use App\Repository\DirectorRepository;

class DirectorController extends AbstractController
{
    /**
     * @Route("/director", name="director")
     */
    public function index(DirectorRepository $repository): Response
    {
        $directors = $repository->findAll();
        return $this->render('director/index.html.twig', [
            'directors' => $directors
        ]);
    }
}
