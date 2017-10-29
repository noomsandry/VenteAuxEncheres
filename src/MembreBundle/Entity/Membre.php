<?php

namespace MembreBundle\Entity;


use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use JMS\Serializer\Annotation as JMSSerializer;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * Membre
 *
 * @ORM\Table(name="membre")
 * @UniqueEntity("email")
 * @UniqueEntity("username")
 * @ORM\Entity(repositoryClass="MembreBundle\Repository\MembreRepository")
 * @JMSSerializer\ExclusionPolicy("all")
 * @JMSSerializer\AccessorOrder("custom", custom = {"id", "username", "email", "accounts"})
 */
class Membre extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @JMSSerializer\Expose
     * @JMSSerializer\Type("string")
     * @JMSSerializer\Groups({"users_all","users_summary"})
     */
    protected $id;

    /**
     * @JMSSerializer\Expose
     * @JMSSerializer\Type("string")
     * @JMSSerializer\Groups({"users_all","users_summary"})
     */
    protected $username;


    /**
     * @var string The email of the user.
     *
     * @JMSSerializer\Expose
     * @JMSSerializer\Type("string")
     * @JMSSerializer\Groups({"users_all","users_summary"})
     */
    protected $email;

    /**
     * @JMSSerializer\Expose
     * @ORM\ManyToOne(targetEntity="MembreBundle\Entity\Type",inversedBy="membres")
     * @ORM\JoinColumn(nullable=false)
     */
    
    private $type;
    
    private $magasin;
    
     /**
     * @var string
     * @JMSSerializer\Expose
     * @ORM\Column(name="localisation", type="string", length=200)
     */
    private $localisation;
    
    
      /**
       * @ORM\OneToOne(targetEntity="CompteBundle\Entity\Compte", cascade={"persist"})
      * @JMSSerializer\Expose
      * @ORM\JoinColumn(nullable=false)
      * @Assert\Valid()
      */
    private $compte;
    
    function getMagasin() {
        return $this->magasin;
    }

    function setMagasin($magasin) {
        $this->magasin = $magasin;
    }

    
    public function __construct()
    {
        parent::__construct();
    }

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
     * Set type
     *
     * @param \MembreBundle\Entity\Type $type
     *
     * @return Membre
     */
    public function setType(\MembreBundle\Entity\Type $type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return \MembreBundle\Entity\Type
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set localisation
     *
     * @param string $localisation
     *
     * @return Membre
     */
    public function setLocalisation($localisation)
    {
        $this->localisation = $localisation;
    
        return $this;
    }

    /**
     * Get localisation
     *
     * @return string
     */
    public function getLocalisation()
    {
        return $this->localisation;
    }

    /**
     * Set compte
     *
     * @param \CompteBundle\Entity\Compte $compte
     *
     * @return Membre
     */
    public function setCompte(\CompteBundle\Entity\Compte $compte)
    {
        $this->compte = $compte;
    
        return $this;
    }

    /**
     * Get compte
     *
     * @return \CompteBundle\Entity\Compte
     */
    public function getCompte()
    {
        return $this->compte;
    }
}
