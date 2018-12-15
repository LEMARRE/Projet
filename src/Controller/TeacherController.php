<?php

namespace App\Controller;
// namespace App\Form;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use App\Entity\Qcm;
use App\Form\QcmType;
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
     * @IsGranted ("ROLE_TEACHER")
     */
    public function admin($id, UserService $userService)
    {
        return $this->render (
            'teacher/teacher.html.twig',
            ['user' => $userService->getById($id),
            'users' => $userService->getAll()
            ]); 
    }


      /**
     * @Route("/teacher/{id}/classRoom", name="teacher_classRoom")
     * @IsGranted ("ROLE_TEACHER")
     */
    public function classRoom($id, UserService $userService)
    {
        return $this->render (
            'teacher/teacherClasse.html.twig',
            ['user' => $userService->getById($id),
            'users' => $userService->getAll()
            ]); 
    }

     


    
}
