<?php 

namespace App\Services;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;
use App\Entity\Avatar;
use App\Entity\Classroom;

class UserService {

    private $om;

    public function __construct( ObjectManager $om) {
        $this->om = $om;
    }

    public function getAll () {
        $repo = $this->om->getRepository( User::class);
        return $repo->findAll();
    }

    public function getAllClassrooms () {
        $repo = $this->om->getRepository( Classroom::class);
        return $repo->findAll();
    }
    public function getClassroomById ($classroom_id) {
        $repo = $this->om->getRepository( Classroom::class);
        return $repo->find($classroom_id);
    }

    public function getById ($id) {
        $repo = $this->om->getRepository( User::class);
        return $repo->find($id);
    }

    public function add($user) {
        $this->om->persist($user);
        $this->om->flush();
    }

    public function addClassroom($classroom) {
        $this->om->persist($classroom);
        $this->om->flush();
    }

    public function getOneBy($avatar)
    {
        $repo =$this->om->getRepository(Avatar::class);
        return $repo->findOneBy($avatar);
    }

    public function getOneByClassCode($classCode)
    {
        $repo =$this->om->getRepository(Classroom::class);
        return $repo->findOneByClassCode($classCode);
    }
    
    public function search($username){
        $repo = $this->om->getRepository( User::class );
        return $repo->search($username);
    }




    // Future fonctionnalité d'ajout d'avatar par un professeur ?

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