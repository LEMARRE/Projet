<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\UserService;

class StudentController extends AbstractController
{
    /**
     * @Route("/student/home", name="student_home")
     */
    public function home()
    {
        return $this->render('student/student.html.twig');
    }


    /**
     * @Route("/student/profil", name="student_profil")
     */
    public function show()
    {
        return $this->render('student/student-profil.html.twig',[
            // "user" => $userService->getById($id)
        ]);
    }
}
