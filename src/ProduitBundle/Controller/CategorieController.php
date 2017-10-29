<?php

namespace ProduitBundle\Controller;

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

class CategorieController extends Controller
{
     /**
     * @Get(
     *     path = "/categories",
     *     name = "get_all_categories",
     * )
      * @View(statusCode = 200,)
     */
    public function getAll()
    {
        $produits = $this->getDoctrine()->getRepository("ProduitBundle:Categorie")->findAll();
        return $produits;
    }
    
    /**
     * @Get(
     *     path = "/categories/{id}",
     *     name = "get_categories_byId",
     * )
      * @View(statusCode = 200,)
     */
    public function getById($id)
    {
        
        return $this->getDoctrine()->getRepository("ProduitBundle:Categorie")->find($id);
                
    }
    
     /**
     *@Delete(
     *     path = "/categories/{id}",
     *     name = "delete_categories",
     * )
      * @View(statusCode = 201,)
     */
    public function delete(Categorie $categorie = null)
    {
       if($categorie != null){
           $em = $this->getDoctrine()->getManager();
           $em->remove($categorie);
           $em->flush();
       }
       return $categorie;
    }
    
    /**
     * @Post("/categories")
     *  @View(statusCode = 201,)
     * @ParamConverter("categorie", converter="fos_rest.request_body")
     */
    public function create(Categorie $categorie)
    {
        $validator = $this->get("validator");
        $liste_erreurs = $validator->validate($categorie);
        if(count($liste_erreurs) == 0){
            $mg = $this->getDoctrine()->getManager();
            $mg->persist($categorie);
            $mg->flush();
        }else{
            return new Response("Json invalide",Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @Put("/categories-update/{id}")
     *  @View(statusCode = 201,)
     * @ParamConverter("categorie", converter="fos_rest.request_body")
     */
    public function update(Categorie $categorie, $id)
    {
        $validator = $this->get("validator");
        $liste_erreurs = $validator->validate($categorie);

        $em =  $this->getDoctrine()->getEntityManager();
        $categorieId = $this->getDoctrine()->getRepository("ProduitBundle:Categorie")->find($id);

        if(count($liste_erreurs) == 0){
            if($categorieId->getId() == $categorie->getId()){
                $categorieId = $categorie;
                $em->merge($categorieId);
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
