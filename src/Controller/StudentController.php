<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\UserService;
use App\Entity\User;
use App\Entity\Avatar;

class StudentController extends AbstractController
{
    /**
     * @Route("/student/home", name="student_home")
     * @IsGranted ("ROLE_STUDENT")
     */
    public function home(UserService $userService)
    {
        $user = $this->getUser();
        $id = $user->getId();
        $avatar = $user->getAvatar();
        $classroom = $user->getClassroom();

        return $this->render (
            'student/student.html.twig',
            ['user' => $userService->getById($id),
            'classroom' => $classroom,
            'avatar' => $avatar
            ]); 
    }

    
    /**
     * @Route("/student/profil", name="student_profil")
     */
    public function profil(UserService $userService)
    {
        $user = $this->getUser();
        $id = $user->getId();
        $avatar = $user->getAvatar();
        $classroom = $user->getClassroom();

        return $this->render (
            'student/studentProfil.html.twig',
            ['user' => $userService->getById($id),
            'classroom' => $classroom,
            'avatar' => $avatar
            ]); 
        }
}