<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher/home", name="teacher")
     */
    public function admin()
    {
        return $this->render('teacher/teacher.html.twig');
    }
}
