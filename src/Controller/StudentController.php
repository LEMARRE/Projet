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
     * @Route("/student/{id}/home", name="student_home", requirements={"id"="\d+"})
     * @IsGranted ("ROLE_STUDENT")
     */
    public function home($id, UserService $userService)
    {
        $user = $userService->getById($id);
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
     * @Route("/student/{id}/profil", name="student_profil", requirements={"id"="\d+"})
     * @IsGranted ("ROLE_STUDENT")
     */
    public function profil($id, UserService $userService)
    {
        $user = $userService->getById($id);
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
        
        
    // /**
    //  * @Route("/student/{id}/games/{game_id}", name="games", requirements={"id"="\d+"})
    //  * @IsGranted ("ROLE_STUDENT")
    //  */
    // public function studentGames($id, $game_id, UserService $userService)
    // {
    //     $user = $userService->getById($id);
    //     $id = $user->getId();
    //     return $this->render (
    //         'student/student.html.twig',
    //         ['user' => $userService->getById($id)
    //         ]); 
    // }
}

