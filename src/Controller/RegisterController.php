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
        // Create an empty User and set it the Teacher role and default Username
        $user = new User();
        $user->setRoles(['ROLE_TEACHER']);
        $user->setUsername('Professeur(e)');

        // Create form :
        $form = $this->createForm(TeacherRegisterType::class, $user);
            $form->handleRequest($request);
            // Password Hash :
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            // Execute if form is valid :
            if ($form->isSubmitted() && $form->isValid()){
                // insert new User into DB
                $userService->add($user);

                $this->addFlash(
                    'notice',
                    'Le professeur a bien été créé! Vous pouvez vous connecter !'
                );

            return $this->redirectToRoute('login');
        }
        return $this->render('register/registerTeacher.html.twig', array(
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/register/student", name="register_student")
     */
    public function createStudent(UserPasswordEncoderInterface $encoder, UserService $userService, Request $request)
    {
        // Create an empty User and set it the student role
        $user = new User();
        $user->setRoles(['ROLE_STUDENT']);

        // Get all classrooms from DB (for classroom verification below)
        $classrooms = $userService->getAllClassrooms();

        // Create form :
        $form = $this->createForm(StudentRegisterType::class, $user);
            $form->handleRequest($request);
            // Password Hash :
            $encoded = $encoder->encodePassword($user, $user->getPassword());
            $user->setPassword($encoded);
            // Execute if form is valid :
            if ($form->isSubmitted() && $form->isValid()){
                // Get the new user and set it a default avatar :
                $avatar = $userService->getOneBy($user);
                $user->setAvatar($avatar);

                $data = $form->getData(); // Get the form data
                $data->getEmail();
                $user->setClassCode($data->getClassCode()); //to set temporarely the ClassCode use by the student
                
                //check if a classroom as such ClassCode or not
                $classCode = $user->getClassCode();
                dump($classCode);
                $classroom = $userService->getOneByClassCode($classCode);

                    // if true, add the good Classroom to the new User and insert it all to DB
                    if ($classroom != null) {
                        $user->addClassroom($classroom);
                        $userService->add($user);
                        $id = $user->getId();

                        $this->addFlash(
                            'notice',
                            'L\'élève a bien été créé! Vous pouvez vous connecter !'
                        );

                    return $this->redirectToRoute('login');
                    } 
                    // if not, don't insert into DB and inform the user
                    else {
                        echo 'Ce code classe n\'est pas valide';
                    }
        }

        return $this->render ('register/registerStudent.html.twig', array(
            'form' => $form->createView()
        ));
    }
}
