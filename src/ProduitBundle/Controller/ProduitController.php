<?php

namespace ProduitBundle\Controller;

use ProduitBundle\ProduitBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use FOS\RestBundle\Controller\Annotations\Get;
use FOS\RestBundle\Controller\Annotations\View;
use FOS\RestBundle\Controller\Annotations\Delete;
use FOS\RestBundle\Controller\Annotations\Post;
use FOS\RestBundle\Controller\Annotations\Put;
use ProduitBundle\Entity\Produit;   
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use \Symfony\Component\HttpFoundation\Response;

class ProduitController extends Controller
{
     /**
     * @Get(
     *     path = "/produits",
     *     name = "get_all_produits",
     * )
      * @View(statusCode = 200,)
     */
    public function getAll()
    {
        $produits = $this->getDoctrine()->getRepository("ProduitBundle:Produit")->findAll();
        return $produits;
    }
    
     /**
     * @Get(
     *     path = "/produits/{id}",
     *     name = "get_produits_byId",
     * )
      * @View(statusCode = 200,)
     */
    public function getById($id)
    {
        return $this->getDoctrine()->getRepository("ProduitBundle:Produit")->find($id);
                
    }
    
     /**
     * @Get(
     *     path = "/produits/{id}/categories",
     *     name = "get_by_categorie",
     * )
      * @View(statusCode = 200,)
     */
    public function getByCategorie($id)
    {
        $produits = $this->getDoctrine()->getRepository("ProduitBundle:Produit")->findBy(array('categorie'=>$id));
        return $produits;
    }
    /**
     * @Get(
     *     path = "/produits/{id}/pack",
     *     name = "get_by_pack",
     * )
     * @View(statusCode = 200,)
     */
    public function getByPack($id)
    {
        $produits = $this->getDoctrine()->getRepository("ProduitBundle:Produit")->findBy(array('pack'=>$id));
        return $produits;
    }

    
    
    /**
     *@Delete(
     *     path = "/produits/{id}",
     *     name = "delete_produits",
     * )
      * @View(statusCode = 201,)
     */
    public function delete(Produit $produit = null)
    {
       if($produit != null){
           $em = $this->getDoctrine()->getManager();
            $em->remove($produit);
            $em->flush();
       }
       return $produit;
               
    }

     /**
     * @Post("/produits")
     *  @View(statusCode = 201,)
     * @ParamConverter("produit", converter="fos_rest.request_body")
     */
    public function create(Produit $produit)
    {
        $doctrine = $this->getDoctrine();
        $em = $doctrine->getEntityManager();
        $validator = $this->get("validator");

        $id1 = $produit->getCategorie()->getId();
        $id2 = $produit->getPack()->getId();

        if( $id1 != 0 && $id2 != 0 ){
            
            $categorie = $doctrine->getRepository("ProduitBundle:Categorie")->find($id1);
            $pack = $doctrine->getRepository("PackBundle:Pack")->find($id2);

            $produit->setCategorie($categorie);
            $produit->setPack($pack);

             if(count($validator->validate($produit)) == 0){
                $em->persist($produit);
                $em->flush();
             }else{
                 return new Response("Json invalide",Response::HTTP_BAD_REQUEST);
             }
        }else{
            if(count($validator->validate($produit)) == 0){
               $em->persist($produit);
               $em->flush();
            }else{
                return new Response("Json invalide",Response::HTTP_BAD_REQUEST);
            }
        }
    }

    /**
     * @Put("/produits/{id}")
     *  @View(statusCode = 201,)
     * @ParamConverter("produit", converter="fos_rest.request_body")
     */
    public function update(Produit $produit, $id)
    {
        $validator = $this->get("validator");
        $liste_erreurs = $validator->validate($produit);

        $em =  $this->getDoctrine()->getEntityManager();
        $produitId = $this->getDoctrine()->getRepository("ProduitBundle:Produit")->find($id);

        if(count($liste_erreurs) == 0){
            if($produitId->getId() == $produit->getId()){
                $produitId = $produit;
                $em->merge($produitId);
                $em->flush();
            }
            else{
                return new Response("Json invalide",Response::HTTP_BAD_REQUEST);
            }
        }
        else{
            return new Response("Json invalide",Response::HTTP_BAD_REQUEST);
        }
    }

}