<?php

namespace App\Controller;

use App\Entity\Qcm;
use App\Form\QcmType;
use App\Form\QuestionType;

use App\Entity\Questions;
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


        $question = new Questions();

        $question->setQuestion('Question 1')
                ->setExperience(10);

        $question2 = new Questions();

        $question2->setQuestion('Question 2')
                ->setExperience(20);

        $qcm->addQuestion($question)
            ->addQuestion($question2);

        $form = $this->createForm(QcmType::class, $qcm);
        
        $form->handleRequest($request);
        
        dump($qcm);
        
        if($form->isSubmitted() && $form->isValid()){
            $manager->persist($qcm);
            $manager->flush();
        }
        
        return $this->render('teacher/createQcm.html.twig', [
            'form' => $form ->createView(),
        ]);
    }

    // public function Qcm()
    // {
    //     $qcm = new Qcm();

    //     $form =$this->createForm( QcmType::class, $qcm);

    //     return $this->render('teacher/createQcm.html.twig', array(
    //         'form'=>$form->createView(),
    //     ));
    // }


}
