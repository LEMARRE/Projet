<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class GamesController extends AbstractController
{
    /**
     * @Route("/games", name="games_home")
     */
    public function home()
    {
        return $this->render('games/games_home.html.twig');
    }

     /**
     * @Route("/games/memory", name="memory")
     */
    public function memory()
    {
        
        return $this->render('games/memory.html.twig');
    }

    // /**
    //  * @Route("/games/quizz", name="quizz")
    //  */
    // public function quizz()
    // {
    //     return $this->render('games/quizz.html.twig');
    // }
    
}