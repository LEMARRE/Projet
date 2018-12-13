<?php

namespace App\Controller;

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
     * @Route("/student/{id}/home", name="student_home", requirements={"id"="\d+"})
     */
    public function home($id, UserService $userService)
    {
        $user = $userService->getById($id);
        $id = $user->getId();
        $avatar = $user->getAvatar();
        return $this->render (
            'student/student.html.twig',
            ['user' => $userService->getById($id),
            'avatar' => $avatar
            ]); 
    }
}
