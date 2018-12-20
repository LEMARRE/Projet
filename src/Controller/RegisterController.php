<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

use App\Services\UserService;
use App\Form\StudentRegisterType;
use App\Form\TeacherRegisterType;
use App\Entity\User;
use App\Entity\Avatar;
use App\Entity\Classroom;

class RegisterController extends AbstractController
{
    /**
     * @Route("/register/teacher", name="register_teacher")
     */
    public function createTeacher(UserPasswordEncoderInterface $encoder, UserService $userService, Request $request)
    {
        $user = new User();
        $user->setRoles(['ROLE_TEACHER']);
        $user->setUsername('Professeur(e)');

        $form = $this->createForm(TeacherRegisterType::class, $user);
            $form->handleRequest($request);
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            if ($form->isSubmitted() && $form->isValid()){
                $userService->add($user);
                $id = $user->getId();
                $this->addFlash(
                    'notice',
                    'Le professeur a bien été créé! Vous pouvez vous connecter !'
                );

<<<<<<< HEAD
            return $this->redirectToRoute('login');
        }
=======
            return $this->redirectToRoute('teacher_home', array(
                'id' => $id));
            }
>>>>>>> dev
        return $this->render('register/registerTeacher.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/register/student", name="register_student")
     */
    public function createStudent(UserPasswordEncoderInterface $encoder, UserService $userService, Request $request)
    {
        $user = new User();
        $user->setRoles(['ROLE_STUDENT']);
        $classrooms = $userService->getAllClassrooms();
        dump($classrooms);

        $form = $this->createForm(StudentRegisterType::class, $user);
            $form->handleRequest($request);
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            if ($form->isSubmitted() && $form->isValid()){
                $avatar = $userService->getOneBy($user);
                $user->setAvatar($avatar);

                $data = $form->getData();
                $user->setClassCode($data->getClassCode());
                $classCode = $user->getClassCode();
                $classroom = $userService->getOneByClassCode($classCode);
                    if ($classroom != null) {
                        $user->addClassroom($classroom);
                        $userService->add($user);
                        $id = $user->getId();
                        $this->addFlash(
                            'notice',
                            'L\'élève a bien été créé! Vous pouvez vous connecter !'
                        );

                    return $this->redirectToRoute('login');
                    } else {
                        echo 'Ce code classe n\'est pas valide';
                    }
        }

        return $this->render ('register/registerStudent.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
