<?php

namespace App\Controller;

use App\Services\UserService;
use App\Services\QcmService;
use App\Entity\Theme;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListgameController extends AbstractController
{
    /**
     * @Route("/listgame", name="listgame")
     */
    public function index(UserService $userService, QcmService $qcmService)
    {

        $user = $this->getUser();
        $id = $user->getId();
        $classrooms = $userService->getAllClassrooms();
        $qcm = $qcmService->getAllQcm();
        $theme = $qcmService->getAllThemes();

        return $this->render('teacher/listgame.html.twig', [
            'controller_name' => 'ListgameController',
            'user' => $userService->getById($id),
            'users' => $userService->getAll(),
            'classrooms' => $classrooms,
            'qcms' => $qcm,
            'theme'=> $theme,
        ]);
    }
}
