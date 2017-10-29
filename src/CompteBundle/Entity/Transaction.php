<?php

namespace CompteBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as Serializer;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Transaction
 *
 * @ORM\Table(name="transaction")
 * @ORM\Entity(repositoryClass="CompteBundle\Repository\TransactionRepository")
 */
class Transaction
{
    /**
     * @var int
     * @Serializer\Expose
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     * @Serializer\Expose
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="montant", type="decimal", precision=10, scale=2)
     */
    private $montant;

    /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="Motif", type="string", length=100)
     */
    private $motif;

    /**
     * @var \DateTime
     * @Serializer\Expose
     * @ORM\Column(name="date", type="date")
     */
    private $date;
    
      /**
     * @var string
     * @Serializer\Expose
     * @ORM\Column(name="newSolde", type="decimal", precision=10, scale=2)
     */
    private $newSolde;
    
      /**
       * @ORM\OneToOne(targetEntity="MembreBundle\Entity\Membre")
      * @Serializer\Expose
      * @ORM\JoinColumn(nullable=false)
      * @Assert\Valid()
      */
    private $membre;
    
    
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
     * @param integer $type
     *
     * @return Transaction
     */
    public function setType($type)
    {
        $this->type = $type;
    
        return $this;
    }

    /**
     * Get type
     *
     * @return integer
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return Transaction
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    
        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * Set motif
     *
     * @param string $motif
     *
     * @return Transaction
     */
    public function setMotif($motif)
    {
        $this->motif = $motif;
    
        return $this;
    }

    /**
     * Get motif
     *
     * @return string
     */
    public function getMotif()
    {
        return $this->motif;
    }



    /**
     * Set date
     *
     * @param \DateTime $date
     *
     * @return Transaction
     */
    public function setDate($date)
    {
        $this->date = $date;
    
        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set membre
     *
     * @param \MembreBundle\Entity\Membre $membre
     *
     * @return Transaction
     */
    public function setMembre(\MembreBundle\Entity\Membre $membre)
    {
        $this->membre = $membre;
    
        return $this;
    }

    /**
     * Get membre
     *
     * @return \MembreBundle\Entity\Membre
     */
    public function getMembre()
    {
        return $this->membre;
    }

    /**
     * Set newSolde
     *
     * @param string $newSolde
     *
     * @return Transaction
     */
    public function setNewSolde($newSolde)
    {
        $this->newSolde = $newSolde;
    
        return $this;
    }

    /**
     * Get newSolde
     *
     * @return string
     */
    public function getNewSolde()
    {
        return $this->newSolde;
    }
}
