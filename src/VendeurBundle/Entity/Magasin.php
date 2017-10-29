<?php

namespace VendeurBundle\Entity;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Magasin
 *
 * @ORM\Table(name="magasin")
 * @ORM\Entity(repositoryClass="VendeurBundle\Repository\MagasinRepository")
 */
class Magasin
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

     /** @ORM\OneToOne(targetEntity="MembreBundle\Entity\Membre")
      * @Serializer\Expose
      *  @ORM\JoinColumn(nullable=false)
      * @Assert\Valid()
      */
    private $vendeur;
    
     /**
      *  @ORM\OneToMany(targetEntity="PackBundle\Entity\Pack",mappedBy="magasin")
      * @Serializer\Expose
      * @Assert\Valid()
      */
    private $packs;
    
    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return Magasin
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    
        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

  

    /**
     * Set vendeur
     *
     * @param \MembreBundle\Entity\Membre $vendeur
     *
     * @return Magasin
     */
    public function setVendeur(\MembreBundle\Entity\Membre $vendeur)
    {
        $this->vendeur = $vendeur;
    
        return $this;
    }

    /**
     * Get vendeur
     *
     * @return \MembreBundle\Entity\Membre
     */
    public function getVendeur()
    {
        return $this->vendeur;
    }
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->packs = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Add pack
     *
     * @param \VendeurBundle\Entity\Magasin $pack
     *
     * @return Magasin
     */
    public function addPack(\VendeurBundle\Entity\Magasin $pack)
    {
        $this->packs[] = $pack;
    
        return $this;
    }

    /**
     * Remove pack
     *
     * @param \VendeurBundle\Entity\Magasin $pack
     */
    public function removePack(\VendeurBundle\Entity\Magasin $pack)
    {
        $this->packs->removeElement($pack);
    }

    /**
     * Get packs
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPacks()
    {
        return $this->packs;
    }
}
