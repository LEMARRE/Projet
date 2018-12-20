<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ListgameController extends AbstractController
{
    /**
     * @Route("/listgame", name="listgame")
     */
    public function index()
    {
        return $this->render('teacher/listgame.html.twig', [
            'controller_name' => 'ListgameController',
        ]);
    }
}
