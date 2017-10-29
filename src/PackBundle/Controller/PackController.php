<?php

namespace PackBundle\Controller;

use PackBundle\Entity\Pack;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use \ProduitBundle\Entity\Categorie;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \Symfony\Component\HttpFoundation\Response;
use PackBundle\Model\EncherirData;
use PackBundle\Entity\Encherir;


class PackController extends Controller
{
    /**
     * @Get(
     *     path = "/pack",
     *     name = "get_all_pack",
     * )
     * @View(statusCode = 200,)
     */
    public function getAll()
    {
        $pack = $this->getDoctrine()->getRepository("PackBundle:Pack")->findAll();
        return $pack;
    }

    /**
     * @Get(
     *     path = "/pack/{id}",
     *     name = "get_pack_byId",
     * )
     * @View(statusCode = 200,)
     */
    public function getById($id)
    {

        return $this->getDoctrine()->getRepository("PackBundle:Pack")->find($id);

    }
    /**
     * @Get(
     *     path = "/pack/{id}/membre",
     *     name = "get_by_membre",
     * )
     * @View(statusCode = 200,)
     */
    public function getByMembre($id)
    {
        $pack = $this->getDoctrine()->getRepository("PackBundle:Pack")->findBy(array('membre'=>$id));
        return $pack;
    }

    /**
     *@Delete(
     *     path = "/pack/{id}",
     *     name = "delete_pack",
     * )
     * @View(statusCode = 201,)
     */
    public function delete(Pack $pack = null)
    {
        if($pack != null){
            $em = $this->getDoctrine()->getManager();
            $em->remove($pack);
            $em->flush();
        }
        return $pack;
    }

    /**
     * @Post("/pack")
     *  @View(statusCode = 201,)
     * @ParamConverter("pack", converter="fos_rest.request_body")
     */
    public function create(Pack $pack)
    {
        $validator = $this->get("validator");
        $membre = $this->get('membre.service')->getCurrentUserFromToken();
        if($membre != null && $membre->hasRole('ROLE_VENDEUR')){
            $magasin = $this->getDoctrine()->getRepository("VendeurBundle:Magasin")->findBy(array("vendeur" => $membre->getId()))[0];
            $pack->setMagasin($magasin);
            if($pack->getPrix() == null)
                $pack->setPrix(0);
            $pack->setEtat($this->container->getParameter('INITIAL'));
            
            $liste_erreurs = $validator->validate($pack);
            
            if(count($liste_erreurs) == 0){
                $mg = $this->getDoctrine()->getManager();
                $mg->persist($pack);
                $mg->flush();
            }
        }else{
           return new Response("Json invalide",Response::HTTP_BAD_REQUEST);
        }   
        
    }
    
   
    /**
     * @Put("/pack/{id}")
     *  @View(statusCode = 201,)
     * @ParamConverter("pack", converter="fos_rest.request_body")
     */
    public function update(Pack $pack, $id){

        $validator = $this->get("validator");
        $liste_erreurs = $validator->validate($pack);

        $em =  $this->getDoctrine()->getEntityManager();

        $packId = $this->getDoctrine()->getRepository("PackBundle:Pack")->find($id);

        if(count($liste_erreurs) == 0){
            if($packId->getId() == $pack->getId()){
                $packId = $pack;
                $em->merge($packId);
                $em->flush();
            }
            else{
                return new Response("Json invalide 1",Response::HTTP_BAD_REQUEST);
            }
        }
        else{
            return new Response("Json invalide 2",Response::HTTP_BAD_REQUEST);
        }
    }
    
     
    
     /**
     * @Post("/pack/vendre/{id}")
     *  @View(statusCode = 201,)
     */
    public function metreEnVente(Pack $pack = null){
         $em =  $this->getDoctrine()->getEntityManager();
         if($pack != null){
            var_dump($pack);
            exit();
             $etat = $this->container->getParameter('EN_ATTENTE');
             // condition
             $pack->setEtat($etat); // etat devient 
         }
                 
    }
}
