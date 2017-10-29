<?php

namespace PackBundle\Model;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation\Type;

/**
 * EncherirData
 
 */
class EncherirData
{
     /**
     * @var int
     * @Type("integer")
     */
    private $pack;

    /**
     * @var int
     * @Type("integer")
     */
    private $acheteur;

    /**
     * @var string
     * @Type("double")
     */
    private $prix;
    
    function getPack() {
        return $this->pack;
    }

    function getAcheteur() {
        return $this->acheteur;
    }

    function getPrix() {
        return $this->prix;
    }

    function setPack($pack) {
        $this->pack = $pack;
    }

    function setAcheteur($acheteur) {
        $this->acheteur = $acheteur;
    }

    function setPrix($prix) {
        $this->prix = $prix;
    }

    

}

