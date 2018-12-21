<?php

namespace App\Controller;


use App\Entity\Qcm;
use App\Entity\Choice;
use App\Entity\Questions;
use App\Services\QcmService;
use Doctrine\ORM\EntityManager;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;




class QuizzController extends AbstractController
{
    // public function __construct(){
    //     $quizz = $this->getDoctrine()->getRepository(Questions::Class);
    //     $question = $this->findAll();

    // }
    
    /**
    * @Route("/games/games2", name="games2")
    */
        public function quizz()
        {
            // $Qcm = $QcmService->getQcmById($id);
            // $questions = $QcmService->getByQcm($Qcm);
            // $choices = $QcmService->getAllChoicesByQuestion($questions);
            
            return $this->render('games/games2.html.twig',[
                // 'qcm' => $Qcm,
                // 'questions' => $questions,
                // 'choices' => $choices

            ]);

            
        }

        
        
}
?>