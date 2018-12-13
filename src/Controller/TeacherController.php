<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\Services\UserService;
use App\Entity\User;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher/{id}/home", name="teacher_home")
     */
    public function admin($id, UserService $userService)
    {
        return $this->render (
            'teacher/teacher.html.twig',
            ['user' => $userService->getById($id)
            ]); 
    }
}
