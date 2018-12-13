<?php

namespace App\Controller;

use App\Entity\Qcm;
use App\Form\QcmType;
use App\Form\QuestionType;

use App\Entity\Questions;
use App\Entity\Choice;
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
    public function createQcm(Request $request, ObjectManager $manager)
    {
        $qcm = new Qcm();
        // -------------------------------------
        $question= new Questions();
        $question->setQuestion('question');
                // ->setExperience('experience');
        $qcm->addQuestion($question);
        // -------------------------------------
        // dump($qcm);
        $form = $this->createForm(QcmType::class, $qcm);
                    //->createForm(QuestionType::class, $response);//A voir avec Robin si il faut le faire
        $form->handleRequest($request);

// ====================================================================================
        // partie choice response
        $response = new Questions();//variable pour les champs questions
        // -------------------------------------------------------------
        $choice = new Choice();
        $choice->setResponse('response')
                ->setChoice('choice');
        $response->addChoice($choice);

        
        $formResp = $this->createForm(QuestionType::class, $response);
        $formResp->handleRequest($request);
        
 // =====================================================================================
        
        if($form->isSubmitted() && $form->isValid()){

            foreach($qcm->getQuestion() as $question){
                $question->addQcm($qcm);
                $manager->persist($question);
            }

            // penser à faire un foreach pour les responses

            $manager->persist($qcm);
            $manager->flush();
        }
        
        return $this->render('teacher/createQcm.html.twig', [
            'form' => $form ->createView(),
            'formResp' => $formResp ->createView(),
        ]);
    }

}
