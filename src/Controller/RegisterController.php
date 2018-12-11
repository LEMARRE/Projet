<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

use App\Services\UserService;
use App\Form\StudentRegisterType;
use App\Form\TeacherRegisterType;
use App\Entity\User;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register/teacher", name="register_teacher")
     */
    public function createTeacher(UserService $UserService, Request $request)
    {
        $user = new User();
        $user->setRoles(['ROLE_TEACHER']);
        $user->setUsername('Professeur(e)');
        $form = $this->createForm(TeacherRegisterType::class, $user);
            $form->handleRequest($request);
            // $encoded = $encoder->encodePassword($user, $user->getPassword());
            // $user->setPassword($encoded);
            if ($form->isSubmitted() && $form->isValid()){
                $UserService->add($user);
                $this->addFlash(
                    'notice',
                    'Le professeur a bien été créé!'
                );

            return $this->redirectToRoute('teacher_home');
        }
        return $this->render('register/registerTeacher.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/register/student", name="register_student")
     */
    public function createStudent(UserService $UserService, Request $request)
    {
        $user = new User();
        $user->setRoles(['ROLE_STUDENT']);
        $form = $this->createForm(StudentRegisterType::class, $user);
            $form->handleRequest($request);
            // $encoded = $encoder->encodePassword($user, $user->getPassword());
            // $user->setPassword($encoded);
            if ($form->isSubmitted() && $form->isValid()){
                $UserService->add($user);
                $this->addFlash(
                    'notice',
                    'L\'élève a bien été créé!'
                );

            return $this->redirectToRoute('student_home');
        }

        return $this->render ('register/registerStudent.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
