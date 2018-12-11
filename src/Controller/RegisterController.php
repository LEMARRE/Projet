<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register/teacher", name="register_teacher")
     */
    public function createTeacher()
    {
        return $this->render('register/registerTeacher.html.twig');
    }

        /**
     * @Route("/register/student", name="register_student")
     */
    public function createStudent()
    {
        return $this->render('register/registerStudent.html.twig');
    }
}
