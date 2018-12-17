<?php

namespace App\Controller;

use App\Entity\Qcm;
use App\Form\QcmType;
use App\Entity\Choice;

use App\Entity\Questions;
use App\Form\QuestionType;
use App\Form\ResponseType;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Console\Question\Question;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class QcmReponseController extends AbstractController
{
    /**
     * @Route("/qcm/reponse", name="qcm_reponse")
     */
    public function createQcm(Request $request, ObjectManager $manager)
    {
        $response = new Questions();//variable pour les champs questions
        // -------------------------------------------------------------
        $choice1 = new Choice();
        $choice1->setChoice('Réponse 1')
                ->setResponse('response');
                
        $response->addChoice($choice1);

        // $choice2 = new Choice();
        // $choice2->setResponse('response')
        //         ->setChoice('Réponse 2');

        // $response->addChoice($choice2);

        dump($response);

        $formResp = $this->createForm(QuestionType::class, $response);
        $formResp->handleRequest($request);
        
        if($formResp->isSubmitted() && $formResp->isValid()){
            $manager->persist($response);
            $manager->flush();
        }

        // ===========================================================

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
        
        return $this->render('qcm_reponse/qcm_reponse.html.twig', [
            'formResp' => $formResp ->createView(),
            'form' => $form->createView(),
        ]);
    }

}
