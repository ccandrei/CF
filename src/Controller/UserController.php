<?php

namespace App\Controller;


use App\Entity\Users;
use App\Form\RegisterType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserController extends AbstractController
{
    /**
     * @Route("/register", name="user_register")
     */
    public function register(Request $request, EntityManagerInterface $em, UserPasswordEncoderInterface $encoder)
    {
        $user = new Users();
        $registerForm = $this->createForm(RegisterType::class, $user);
        $user->setDateCreation(new \DateTime());
        $registerForm->handleRequest($request);

        if ($registerForm->isSubmitted() && $registerForm->isValid()) {

//hasher le mot passe
            $hashed = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($hashed);

            $em->persist($user);
            $em->flush();
        }

        return $this->render('user/register.html.twig', [
            "registerForm" => $registerForm->createView()
        ]);
    }

    /**
     * @Route ("/", name="login")
     */
    public function login()
    {

        return $this->render("user/login.html.twig");
    }

    /**
     * @Route ("/logout", name="logout")
     */
    public function logout()
    {
    }


}
