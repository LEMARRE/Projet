<?php

namespace App\Controller;

use App\Entity\Qcm;
use App\Entity\Choice;
use App\Entity\Questions;
use App\Entity\User;


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
    public function createQcm(Request $request, ObjectManager $manager)
    {
        $qcm = new Qcm();
        dump($qcm);
        $form = $this->createForm(QcmType::class, $qcm);
        $form->handleRequest($request);

// ====================================================================================
        // partie choice response
        $response = new Questions();//variable pour les champs questions
        
        //dump($response);
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
            }

            $manager->persist($qcm);
            $manager->flush();

            //rediriger vers la page liste QCM
            //return $this->redirectionToRoute('')
        }
        
        return $this->render('teacher/createQcm.html.twig', [
            'form' => $form ->createView(),
            // 'formResp' => $formResp ->createView(),
        ]);
    }

}
