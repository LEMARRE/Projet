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
use App\Controller\QcmController;

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

                    foreach($question->getChoice() as $choice){
                        $choice->setQuestions($question);
                    }

                $manager->persist($question);
            }

            $manager->persist($qcm);
            $manager->flush();

            //rediriger vers la page liste QCM
            return $this->redirectToRoute('listgame');
        }
        
        return $this->render('teacher/createQcm.html.twig', [
            'form' => $form ->createView(),
            'formResp' => $formResp ->createView(),
            'user' => $userService->getById($id),
            'users' => $userService->getAll(),
            'classrooms' => $classrooms,
        ]);
    }

}
