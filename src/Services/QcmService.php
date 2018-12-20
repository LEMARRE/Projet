<?php 

namespace App\Services;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Qcm;
use App\Entity\Choice;
use App\Entity\Questions;

class QcmService {

    private $om;

    public function __construct( ObjectManager $om) {
        $this->om = $om;
    }

    public function getAllQcm () {
        $repo = $this->om->getRepository( Qcm::class);
        return $repo->findAll();
    }

    public function getQcmById ($id) {
        $repo = $this->om->getRepository( Qcm::class);
        return $repo->find($id);
    }

    

    public function getAllChoices () {
        $repo = $this->om->getRepository( Choice::class);
        return $repo->findAll();
    }

    public function getAllChoicesByQuestion ($question) {
        $repo = $this->om->getRepository( Choice::class);
        return $repo->find($question);
    }

    public function getAllQuestions () {
        $repo = $this->om->getRepository( Questions::class);
        return $repo->findAll();
    }

    public function findByQcm ($Qcm) {
        $repo = $this->om->getRepository( Questions::class);
        return $repo->find($Qcm);
    }

    public function getByQcm($Qcm)
    {
        $repo =$this->om->getRepository(Questions::class);
        return $repo->findByQcm($Qcm);
    }

    public function add($Qcm) {
        $this->om->persist($Qcm);
        $this->om->flush();
    }

    public function getOneBy($id)
    {
        $repo =$this->om->getRepository(Qcm::class);
        return $repo->findOneBy($id);
    }
    


    // CODE CI DESSOUS REPRIS DE BEERTIME AU CAS OU ON EN AURAIT BESOIN ! 


    // public function getByName($name, $sort, $page)
    // {
    //     $repo =$this->om->getRepository(User::class);
    //     return $repo->searchByName($name, $sort, $page);
    // }

    // private function setupMedia($user)
    // {
    //     if (!empty($user->getPosterUrl() ) ) {
    //         return $user->setPoster ($user->getPosterUrl());
    //     }
    //     $file = $user->getPosterFile();
    //     $fileName = md5( uniqid() ) .'.'.$file->guessExtension();
    //     $file->move ( './data', $fileName );
    //     return $user->setPoster($fileName);
    // }

}


?>