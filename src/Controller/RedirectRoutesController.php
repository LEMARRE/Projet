<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use App\Entity\User;

class RedirectRoutesController extends AbstractController
{
        /**
         * @Route("/redirect", name="redirect")
         */
        public function redirectRoutes()
        {
            $user = $this->getUser();
            $user_role = $user->getRoles();

            if ($user_role == ['ROLE_STUDENT']) {
                return $this->redirectToRoute('student_home');
            } return $this->redirectToRoute('teacher_home');
    }
}
        
