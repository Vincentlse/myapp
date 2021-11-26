<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use App\Entity\Genre;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Movie;

class MovieFixtures extends Fixture
{
    public function load(ObjectManager $mg): void
    {
        // $product = new Product();
        // $manager->persist($product);

        $genre1= new Genre();
        $genre1->setGenre("Comedie");
        $mg->persist($genre1);

        $genre2= new Genre();
        $genre2->setGenre("Drame");
        $mg->persist($genre2);

        $genre3= new Genre();
        $genre3->setGenre("Fantastique");
        $mg->persist($genre3);

        $film1 = new Movie();
      $film1->setTitre("A bout de souffle")->setDescription("desc 1")->setAffiche("aboutdesouffle.jpg")->setGenre($genre2);
      $mg->persist($film1);

      $film2 = new Movie();
      $film2->setTitre("Pierrot le fou")->setDescription("desc 2")->setAffiche("pierrotlefou.jpg")->setGenre($genre2);
       $mg->persist($film2);

       $film3 = new Movie();
      $film3->setTitre("La grande vadrouille")->setDescription("desc 3")->setAffiche("vadrouille.jpg")->setGenre($genre1);
       $mg->persist($film3);

       $film4 = new Movie();
      $film4->setTitre("Le cercle rouge")->setDescription("desc 4")->setAffiche("cerclerouge.jpg")->setGenre($genre2);
       $mg->persist($film4);
    
       $actor1 = new Actor();
       $actor1->setNom("Marielle")
                   ->setPrenom("Jean-Pierre")
                   ->setPhoto("marielle.jpg")
                   ->addMovie($film1)
                   ->addMovie($film2)
                   ;
           $mg->persist($actor1);

           $actor2 = new Actor();
           $actor2->setNom("Bourvil")
                       ->setPrenom("André")
                       ->setPhoto("bourvil.jpg")
                       ->addMovie($film3)
                       ->addMovie($film4)
                       ;
               $mg->persist($actor2);

        $mg->flush();
    }
}
