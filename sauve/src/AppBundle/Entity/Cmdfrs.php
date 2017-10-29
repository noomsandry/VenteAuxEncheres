<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Cmdfrs
 *
 * @ORM\Table(name="cmdfrs")
 * @ORM\Entity
 */
class Cmdfrs
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datecmdfrs", type="date", nullable=false)
     */
    private $datecmdfrs;

    /**
     * @var integer
     *
     * @ORM\Column(name="numcmdfrs", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numcmdfrs;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ligneentree", mappedBy="numcmdfrs")
     */
    private $ligneentree;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ligneentree = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set datecmdfrs
     *
     * @param \DateTime $datecmdfrs
     *
     * @return Cmdfrs
     */
    public function setDatecmdfrs($datecmdfrs)
    {
        $this->datecmdfrs = $datecmdfrs;

        return $this;
    }

    /**
     * Get datecmdfrs
     *
     * @return \DateTime
     */
    public function getDatecmdfrs()
    {
        return $this->datecmdfrs;
    }

    /**
     * Get numcmdfrs
     *
     * @return integer
     */
    public function getNumcmdfrs()
    {
        return $this->numcmdfrs;
    }

    /**
     * Add ligneentree
     *
     * @param \AppBundle\Entity\Ligneentree $ligneentree
     *
     * @return Cmdfrs
     */
    public function addLigneentree(\AppBundle\Entity\Ligneentree $ligneentree)
    {
        $this->ligneentree[] = $ligneentree;

        return $this;
    }

    /**
     * Remove ligneentree
     *
     * @param \AppBundle\Entity\Ligneentree $ligneentree
     */
    public function removeLigneentree(\AppBundle\Entity\Ligneentree $ligneentree)
    {
        $this->ligneentree->removeElement($ligneentree);
    }

    /**
     * Get ligneentree
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getLigneentree()
    {
        return $this->ligneentree;
    }
    
    public function __toString() {
        return "".$this->getNumcmdfrs()."";
    }
}
