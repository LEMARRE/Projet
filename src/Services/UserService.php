<?php 

namespace App\Services;

use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\User;

class UserService {

    private $om;

    public function __construct( ObjectManager $om) {
        $this->om = $om;
    }

    public function getAll () {
        $repo = $this->om->getRepository( User::class);
        return $repo->findAll();
    }

    public function getById ($id) {
        $repo = $this->om->getRepository( User::class);
        return $repo->find($id);
    }

    
    public function add($user) {
        $this->om->persist($user);
        $this->om->flush();
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