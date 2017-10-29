<?php

namespace PackBundle\Repository;

/**
 * PackRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class PackRepository extends \Doctrine\ORM\EntityRepository
{
    
    public function getByVendeur($id_vendeur){
        
        
        $em = $this->getEntityManager();
        $dql = "SELECT p FROM PackBundle:Pack p JOIN p.magasin m JOIN m.vendeur v WHERE v.id = :id_vendeur";
        $packs = $em->createQuery($dql)
                ->setParameter('id_vendeur', $id_vendeur)
                ->getResult();
        return $packs;
        
    }
}
