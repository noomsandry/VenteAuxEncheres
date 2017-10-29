<?php

namespace VendeurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \Symfony\Component\HttpFoundation\Response;
use MembreBundle\Entity\Membre;     


class VendeurController extends Controller
{
  /**
     * @Get(
     *     path = "/vendeur/alimenter/{id_prod}",
     *     name = "alimenter_magasin",
     * )
     * @View(statusCode = 200,)
     */
    public function alimenter($id_prod)
    {
        $membre = $this->get('membre.service')->getCurrentUserFromToken();
        if($membre != null && $membre->hasRole('ROLE_VENDEUR')){
             $magasin = $this->getDoctrine()->getRepository("VendeurBundle:Magasin")->findBy(array("vendeur" => $membre->getId()))[0];
             $produit = $this->getDoctrine()->getRepository("ProduitBundle:Produit")->find($id_prod);
             $em = $this->getDoctrine()->getManager();
             if($produit != null && $produit->getMagasin() == null && $magasin != null){
               $produit->setMagasin($magasin);
                $em->flush();
             }else{
                 return new Response("Produitn'existe pas",Response::HTTP_BAD_REQUEST);
             }
        }else{
             return new Response("L'utilisateur n'est pas un vendeur",Response::HTTP_BAD_REQUEST);
        }
        
        
    }
  /**
     * @Get(
     *     path = "/vendeur/magasin",
     *     name = "get_magasin",
     * )
     * @View(statusCode = 200,)
     */
    public function getMagasin()
    {
        $membre = $this->get('membre.service')->getCurrentUserFromToken();
        if($membre != null && $membre->hasRole('ROLE_VENDEUR')){
            $magasin = $this->getDoctrine()->getRepository("VendeurBundle:Magasin")->findBy(array("vendeur" => $membre->getId()))[0];
            return $magasin;
        }   
    }
    
    /**
     * @Get(
     *     path = "/vendeur/produits",
     *     name = "get_produit_vendeur",
     * )
     * @View(statusCode = 200,)
     */
    public function getProduit()
    {
        $membre = $this->get('membre.service')->getCurrentUserFromToken();
        if($membre != null && $membre->hasRole('ROLE_VENDEUR')){
            $produits = $this->getDoctrine()->getRepository("ProduitBundle:Produit")->getByVendeur($membre->getId());
            return $produits;
        }   
    }
    
     /**
     * @Get(
     *     path = "/vendeur/packs",
     *     name = "get_pack_vendeur",
     * )
     * @View(statusCode = 200,)
     */
    public function getPack()
    {
        $membre = $this->get('membre.service')->getCurrentUserFromToken();
        if($membre != null && $membre->hasRole('ROLE_VENDEUR')){
            $packs = $this->getDoctrine()->getRepository("PackBundle:Pack")->getByVendeur($membre->getId());
            var_dump($packs);
            return $packs;
        }   
    }
  
    
    
    
}
