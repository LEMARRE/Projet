<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use App\Services\UserService;

class AjaxController extends AbstractController
{
    /**
     * @Route("/ajax", name="ajax")
     */
    public function ajax(Request $request, UserService $userService)
    {
        $email = $request->request->get('email');

        $response = new JsonResponse();
        
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {

            $exist = $userService->getByEmail($email);


            if (!empty ($exist)) {
                $response->setData(array('exist' => true, 'valid' => true));
            } else {
                $response->setData(array('exist' => false, 'valid' => true));
            }
            return $response;
            
        } else {
            $response->setData(array('exist' => false, 'valid' => false));
            return $response;
        }
    }
}
