<?php

namespace App\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    /**
     * @Route("/login", name="login")
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {        
        return $this->render('login/login.html.twig'
        , array(
            'email'=>$authenticationUtils->getLastUsername(), //Lastusername = loggin mail(et non username)
            'error'=>$authenticationUtils->getLastAuthenticationError(),
        ));
    }

}
