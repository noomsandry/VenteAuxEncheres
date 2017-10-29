<?php

namespace PackBundle\Entity;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\ORM\Mapping as ORM;

/**
 * Encherir
 *
 * @ORM\Table(name="encherir")
 * @ORM\Entity(repositoryClass="PackBundle\Repository\EncherirRepository")
 */
class Encherir
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
     * @ORM\Column(name="prix", type="decimal", precision=10, scale=2)
     */
    private $prix;

    /**
     * @var \DateTime
     * @ORM\Column(name="date_enchere", type="date")
     */
    private $date_enchere;

    /** @ORM\OneToOne(targetEntity="MembreBundle\Entity\Membre")
     * @Serializer\Expose
     *  @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @Assert\Valid()
     */
    private $acheteur;
    
     /** @ORM\OneToOne(targetEntity="PackBundle\Entity\Pack")
     * @Serializer\Expose
     *  @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @Assert\Valid()
     */
    private $pack;
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
     * Set prix
     *
     * @param string $prix
     *
     * @return Encherir
     */
    public function setPrix($prix)
    {
        $this->prix = $prix;
    
        return $this;
    }

    /**
     * Get prix
     *
     * @return string
     */
    public function getPrix()
    {
        return $this->prix;
    }

    /**
     * Set dateEnchere
     *
     * @param \DateTime $dateEnchere
     *
     * @return Encherir
     */
    public function setDateEnchere($dateEnchere)
    {
        $this->date_enchere = $dateEnchere;
    
        return $this;
    }

    /**
     * Get dateEnchere
     *
     * @return \DateTime
     */
    public function getDateEnchere()
    {
        return $this->date_enchere;
    }

    /**
     * Set acheteur
     *
     * @param \MembreBundle\Entity\Membre $acheteur
     *
     * @return Encherir
     */
    public function setAcheteur(\MembreBundle\Entity\Membre $acheteur)
    {
        $this->acheteur = $acheteur;
    
        return $this;
    }

    /**
     * Get acheteur
     *
     * @return \MembreBundle\Entity\Membre
     */
    public function getAcheteur()
    {
        return $this->acheteur;
    }

    /**
     * Set pack
     *
     * @param \PackBundle\Entity\Pack $pack
     *
     * @return Encherir
     */
    public function setPack(\PackBundle\Entity\Pack $pack)
    {
        $this->pack = $pack;
    
        return $this;
    }

    /**
     * Get pack
     *
     * @return \PackBundle\Entity\Pack
     */
    public function getPack()
    {
        return $this->pack;
    }
}
