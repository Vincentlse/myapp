<?php

namespace App\DataFixtures;

use App\Entity\Director;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class DirectorFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // $product = new Product();
        // $manager->persist($product);
        $d1 = new Director();
        $d1->setNom("Truffaut")
            ->setPrenom("François");

        $manager->persist($d1);

        $d2 = new Director();
        $d2->setNom("Oury")
            ->setPrenom("Gerard");

        $manager->persist($d2);

        $d3 = new Director();
        $d3->setNom("Besson")
            ->setPrenom("Luc");

        $manager->persist($d3);

        $manager->flush();
    }
}
