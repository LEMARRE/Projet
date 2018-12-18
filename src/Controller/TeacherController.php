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
use Symfony\Component\Form\FormBuilder;
use App\Services\UserService;
use App\Entity\User;
use App\Entity\Classroom;

class TeacherController extends AbstractController
{
    /**
     * @Route("/teacher/home", name="teacher_home")
     * @IsGranted ("ROLE_TEACHER")
     */
    public function admin(UserService $userService)
    {
        $user = $this->getUser();
        $id = $user->getId();
        return $this->render (
            'teacher/teacher.html.twig',
            ['user' => $userService->getById($id),
            'users' => $userService->getAll()
            ]);
    }

    /**
     * @Route("/teacher/create_classroom", name="create_classroom")
     * @IsGranted ("ROLE_TEACHER")
     */
    public function createClassroom(Request $request, UserService $userService)
    {
        $user = $this->getUser();
        $id = $user->getId();

        if (!empty($request->get('class_name'))) {
            $class_name = $request->get('class_name');
            $classroom = new Classroom();
            $classroom->setName($class_name);
            $random = random_int(1, 10000);
            $classroom->setClassroomCode($random);
            $userService->addClassroom($classroom);
            $this->addFlash(
                'notice',
                'La classe a bien été créée!');
            }

        return $this->render (
            'teacher/createClassroom.html.twig',
            ['user' => $userService->getById($id),
            'users' => $userService->getAll()
            ]);
        
    }


    /**
     * @Route("/teacher/classroom", name="teacher_classroom")
     * @IsGranted ("ROLE_TEACHER")
     */
    public function classroom(UserService $userService)
    {
        $user = $this->getUser();
        $id = $user->getId();
        return $this->render (
            'teacher/teacherClassroom.html.twig',
            ['user' => $userService->getById($id),
            'users' => $userService->getAll()
            
            ]); 
    }
        
}
