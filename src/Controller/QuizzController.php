<?php

namespace App\Controller;


use App\Entity\Qcm;
use App\Entity\Choice;
use App\Entity\Questions;
use Doctrine\ORM\EntityManager;
use App\Repository\ChoiceRepository;
use App\Repository\QuestionsRepository;
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
    * @Route("/games/quizz/{id}", name="quizz")
    */
        public function quizz(QuestionsRepository $quizz, ChoiceRepository $choices)
        {
            // $quizz = $this->getDoctrine()->getRepository(Questions::Class);
            // $choices = $this->getDoctrine()->getRepository(Choice::Class);

            $questions = $quizz->findOneById(1);
            $choice1 = $choices->findOneById(1);
            $choice2 = $choices->findOneById(2);
            $choice3 = $choices->findOneById(3);
            $choice4 = $choices->findOneById(4);

            $form = $this->createFormBuilder()
                         ->add('name')
                         ->getForm();

              // récupérer les variables POST
            // $answer = $request->get('choices');

       

            return $this->render('games/quizz.html.twig',[
                'questions' => $questions,
                'choices' => $choices,
                'choice1' => $choice1,
                'choice2' => $choice2,
                'choice3' => $choice3,
                'choice4' => $choice4,
                // 'request' => $request,
                // 'answer'  => $answer,
                'form' => $form->createView()
            ]);
        }

        
        
}
?>