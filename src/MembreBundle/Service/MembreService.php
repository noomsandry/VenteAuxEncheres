<?php

namespace MembreBundle\Service;

use Symfony\Component\HttpFoundation\Request;

class MembreService {
    
    private $decoder;
    private $doctrine;
    
    function __construct($decoder , $doctrine) {
        $this->decoder = $decoder;
        $this->doctrine = $doctrine;
        
    }
    public function getCurrentUserFromToken(){
        $request = Request::createFromGlobals();
        $data = $this->decoder->decode($request->headers->get('Authorization'));
        $user = $this->doctrine->getRepository("MembreBundle:Membre")->find($data['userId']);
        return $user;
    }
}
