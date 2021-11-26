<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use App\Entity\Genre;

class GenreFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $g1 = new Genre();
        $g1->setGenre("Comédie");
        $manager->persist($g1);


        $g2 = new Genre();
        $g2->setGenre("Drame");
        $manager->persist($g2);

        $g3 = new Genre();
        $g3->setGenre("Fantastique");
        $manager->persist($g3);

        $manager->flush();
    }
}
