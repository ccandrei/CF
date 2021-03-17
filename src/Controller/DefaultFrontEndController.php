<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultFrontEndController extends AbstractController
{
    /**
     * @Route("/frontend", name="default_front_end")
     */
    public function index(): Response
    {
        return $this->render('default_front_end/index.html.twig', [
            'controller_name' => 'DefaultFrontEndController',
        ]);
    }

    /**
     * @Route ("/destockage", name="destockage")
     */
    public function destockage(){
        return $this->render('default_front_end/destockage.html.twig');
    }
}
