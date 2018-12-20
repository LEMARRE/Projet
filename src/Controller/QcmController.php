<?php

namespace App\Controller;

use App\Entity\Qcm;
use App\Entity\Choice;
use App\Entity\Questions;
use App\Entity\User;

use App\Services\UserService;

use App\Form\QcmType;
use App\Form\ResponseType;
use App\Form\QuestionType;

use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Console\Question\Question;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QcmController extends AbstractController
{
    /**
     * @Route("/teacher/createQcm", name="create_qcm")
     */
    public function createQcm(Request $request, ObjectManager $manager, UserService $userService)
    {
        $user = $this->getUser();
        $id = $user->getId();
        $classrooms = $userService->getAllClassrooms();


        $qcm = new Qcm();
        // -------------------------------------
        // $question= new Questions();
        // $question->setQuestion('question');
                // ->setExperience('experience');
        // $qcm->addQuestion($question);
        // -------------------------------------
        dump($qcm);
        $form = $this->createForm(QcmType::class, $qcm);
        $form->handleRequest($request);

// ====================================================================================
        // partie choice response
        $response = new Questions();//variable pour les champs questions
        // -------------------------------------------------------------
        $choice1 = new Choice();
        $choice1->setResponse('response')
                ->setChoice('Réponse 1');

        $response->addChoice($choice1);

        $choice2 = new Choice();
        $choice2->setResponse('response')
                ->setChoice('Réponse 2');

        $response->addChoice($choice2);
        
        dump($response);
        $formResp = $this->createForm(QuestionType::class, $response);
        $formResp->handleRequest($request);
        
// =====================================================================================
        
        if($form->isSubmitted() && $form->isValid()){

            foreach($qcm->getQuestion() as $question){
                $question->addQcm($qcm);

            //FAIRE UNE SECONDE BOUCLE SUR QUESTION  
            foreach($question->getChoice() as $choice){
                $choice->setQuestions($question);
            }
                $manager->persist($question);
                $manager->persist($choice);
            }

            // penser à faire un foreach pour les responses

            $manager->persist($qcm);
            $manager->flush();
        }
        
        return $this->render('teacher/createQcm.html.twig', [
            'form' => $form ->createView(),
            'formResp' => $formResp ->createView(),
            'user' => $userService->getById($id),
            'users' => $userService->getAll(),
            'classrooms' => $classrooms
        ]);
    }

}
