<?php

namespace App\Controller;

use App\Entity\Annonces;
use App\Entity\Commandes;
use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefautlBackOfficeController extends AbstractController
{
    /**
     * @Route("/backoffice", name="backoffice")
     */
    public function index(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Users::class);
        $user = $repo->findAll();

        return $this->render('default_back_office/index.html.twig', [
            'user' => $user
        ]);
    }


    /**
     * @Route("/annonces", name="annonces")
     */
    public function annonces(): Response
    {

        $repo = $this->getDoctrine()->getRepository(Annonces::class);

        $annonces = $repo->findAll();

        return $this->render('default_back_office/annonces.html.twig', [
            'annonces' => $annonces
        ]);
    }


    /**
     * @Route("/evaluations", name="evaluations")
     */
    public function evaluations(): Response
    {
        return $this->render('default_back_office/evaluations.html.twig');
    }

    /**
     * @Route("/evenements", name="evenements")
     */
    public function evenements(): Response
    {
        return $this->render('default_back_office/evenements.html.twig');
    }

    /**
     * @Route("/transactions", name="transactions")
     */
    public function transactions(): Response
    {
        $repo1 = $this->getDoctrine()->getRepository(Users::class);

        $users = $repo1->findAll();

        $repo = $this->getDoctrine()->getRepository(Commandes::class);

        $transactions = $repo->findAll();

        return $this->render('default_back_office/transactions.html.twig',
            [
                'users' => $users,
            'transactions'=>$transactions
        ]);
    }

    /**
     * @Route("/utilisateurs", name="utilisateurs")
     */
    public function utilisateurs(): Response
    {
        $repo = $this->getDoctrine()->getRepository(Users::class);

        $users = $repo->findAll();


        return $this->render('default_back_office/utilisateurs.html.twig', [
            'users' => $users
        ]);
    }

    /**
     * @Route("/frontend", name="front_end")
     */
    public function frontEnd(): Response
    {
        return $this->render('default_front_end/register.html.twig', [
            'controller_name' => 'DefaultFrontEndController',
        ]);
    }
}
