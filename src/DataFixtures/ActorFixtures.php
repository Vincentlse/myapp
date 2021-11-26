<?php

namespace App\DataFixtures;

use App\Entity\Actor;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ActorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $a1 = new Actor();
        $a1->setNom("De Funes")
            ->setPrenom("Louis")->setPhoto("De_Funes.jpg");

        $manager->persist($a1);

        $a2 = new Actor();
        $a2->setNom("Delon")
            ->setPrenom("Alain")->setPhoto("alain_delon.jpg");

        $manager->persist($a2);

        $a3 = new Actor();
        $a3->setNom("Belmondo")
            ->setPrenom("Jean-Paul")->setPhoto("belmondo.jpg");

        $manager->persist($a3);

        $a4 = new Actor();
        $a4->setNom("Bourvil")
            ->setPrenom("Andre")->setPhoto("bourvil.jpg");

        $manager->persist($a4);

        $manager->flush();
    }
}
