<?php

namespace App\DataFixtures;

use App\Entity\Annonces;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AnnoncesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 100; $i++) {
            $annonce = new Annonces();
            $annonce->setTitre("Titre article n°$i")
                ->setDescription("<p>Description de l'annonce n°$i</p>")
                ->setImage("http://placeholder.it/350x150")
                ->setPrix(rand(1, 100))
                ->setDateCreation(new \DateTime());

            $manager->persist($annonce);
        }

        $manager->flush();
    }
}
