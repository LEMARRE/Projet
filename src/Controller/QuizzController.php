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


class QuizzController extends AbstractController{


    /**
    * @Route("/games/quizz/{id}", name="quizz")
    */
    public function quizz(Request $request, $id){

        $qcms = $this->getDoctrine()->getRepository(Qcm::Class);
        $quizz = $this->getDoctrine()->getRepository(Questions::Class);
        $allChoices = $this->getDoctrine()->getRepository(Choice::Class);

        $qcm = $qcms->find($id);
        $questions = $quizz->findAll();
        $choices = $allChoices->findAll();
        
        if( $request->getMethod() === 'POST'){
            
            foreach ($request->request as $answer)
            {
                if($answer == "1"){
                 dump($request->request->all());   
                }else if($answer == ""){
                    
                }
            }
        }
        
        
         
        
            
    return $this->render('games/quizz.html.twig',[
        'qcm' => $qcm,
        'questions' => $questions,
        'choices' => $choices,
        'request' => $request
        ]);
           
    }  
    

    // public function checkQuizzData(){
    //     
    //     {
    //     foreach ($request.request as $answer)
    //         {
    //             if($answer == "1"){
    //                 dump($answer);
    //             }else if($answer == ""){
    //                 echo "vous avez une mauvaise reponse";
    //             }
    //         }
    //     }
        
         
    // }
}
?>