<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('login/login.html.twig', array(
            'lastUsername' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ));
    }

    /**
     * @Route("/logout", name="logout")
     */
    public function logout(AuthenticationUtils $authenticationUtils)
    {
        return $this->render('login/login.html.twig');
    }

}
