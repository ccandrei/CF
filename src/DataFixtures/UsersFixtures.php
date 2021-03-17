<?php

namespace App\DataFixtures;

use App\Entity\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class UsersFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {

//        for ($i = 1; $i <= 100; $i++) {
//            $user = new Users();
//            $user->setUsername("utilisateur $i")
//                ->setEmail("utilisateur $i@yahoo.com")
//                ->setPassword(rand(100,1000))
//                ->setDateCreation(new \DateTime());
//
//            $manager->persist($user);
//        }
        // $product = new Product();
        // $manager->persist($product);

        $manager->flush();
    }
}
