<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ErrorController extends AbstractController
{
    /**
     * @Route("/error403", name="error403")
     */
    public function error()
    {
        return $this->render('error/error403.html.twig');
    }
}
