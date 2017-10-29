<?php

namespace AcheteurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \Symfony\Component\HttpFoundation\Response;

class AcheteurController extends Controller
{
     /**
     * @Post("/acheteur/encherir")
     *  @View(statusCode = 201,)
     * @ParamConverter("encherirData", converter="fos_rest.request_body")
     */
    public function encherirPack(EncherirData $encherirData){
         $em =  $this->getDoctrine()->getEntityManager();
         $pack = $this->getDoctrine()->getRepository("PackBundle:Pack")->find($encherirData->getPack());
         $acheteur = $this->getDoctrine()->getRepository("MembreBundle:Membre")->find($encherirData->getAcheteur());
         
         if($pack != null && $acheteur != null){
            $encherir = new Encherir();
            $encherir->setAcheteur($acheteur);
            $encherir->setDateEnchere(new \DateTime());
            $encherir->setPrix($encherirData->getPrix());
            $encherir->setPack($pack);
            
            /// condition compte
            $em->persist($encherir);
            $em->flush();
         }else{
            return new Response("Pack ou Acheteur n'existe pas",Response::HTTP_BAD_REQUEST);
        }
                 
    }
}
