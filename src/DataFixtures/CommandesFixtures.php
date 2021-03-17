<?php

namespace App\DataFixtures;

use App\Entity\Commandes;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CommandesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 100; $i++) {
            $commande = new Commandes();
            $y = rand(10000,15000);
            $commande->setNumeroCommande("$y$i")
                ->setStatut("accepted")
                ->setDateCreation(new \DateTime());
            $manager->persist($commande);

        }

        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
