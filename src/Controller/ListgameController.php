<?php

namespace App\Controller;

use App\Services\UserService;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListgameController extends AbstractController
{
    /**
     * @Route("/listgame", name="listgame")
     */
    public function index(UserService $userService)
    {

        $user = $this->getUser();
        $id = $user->getId();
        $classrooms = $userService->getAllClassrooms();

        return $this->render('teacher/listgame.html.twig', [
            'controller_name' => 'ListgameController',
            'user' => $userService->getById($id),
            'users' => $userService->getAll(),
            'classrooms' => $classrooms
        ]);
    }
}
