<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sousproduit
 *
 * @ORM\Table(name="sousproduit", indexes={@ORM\Index(name="i_fk_sousproduit_produit", columns={"numprod"})})
 * @ORM\Entity
 */
class Sousproduit
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateperump", type="date", nullable=false)
     */
    private $dateperump;

    /**
     * @var integer
     *
     * @ORM\Column(name="pu", type="bigint", nullable=false)
     */
    private $pu;

    /**
     * @var integer
     *
     * @ORM\Column(name="qtesousprod", type="bigint", nullable=false)
     */
    private $qtesousprod;

    /**
     * @var integer
     *
     * @ORM\Column(name="numsousprod", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numsousprod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Ligneentree", mappedBy="numsousprod")
     */
    private $ligneentree;

    /**
     * @var \AppBundle\Entity\Produit
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Produit")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numprod", referencedColumnName="numprod")
     * })
     */
    private $numprod;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->ligneentree = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set dateperump
     *
     * @param \DateTime $dateperump
     *
     * @return Sousproduit
     */
    public function setDateperump($dateperump)
    {
        $this->dateperump = $dateperump;

        return $this;
    }

    /**
     * Get dateperump
     *
     * @return \DateTime
     */
    public function getDateperump()
    {
        return $this->dateperump;
    }

    /**
     * Set pu
     *
     * @param integer $pu
     *
     * @return Sousproduit
     */
    public function setPu($pu)
    {
        $this->pu = $pu;

        return $this;
    }

    /**
     * Get pu
     *
     * @return integer
     */
    public function getPu()
    {
        return $this->pu;
    }

    /**
     * Set qtesousprod
     *
     * @param integer $qtesousprod
     *
     * @return Sousproduit
     */
    public function setQtesousprod($qtesousprod)
    {
        $this->qtesousprod = $qtesousprod;

        return $this;
    }

    /**
     * Get qtesousprod
     *
     * @return integer
     */
    public function getQtesousprod()
    {
        return $this->qtesousprod;
    }

    /**
     * Get numsousprod
     *
     * @return integer
     */
    public function getNumsousprod()
    {
        return $this->numsousprod;
    }

    /**
     * Add ligneentree
     *
     * @param \AppBundle\Entity\Ligneentree $ligneentree
     *
     * @return Sousproduit
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

    /**
     * Set numprod
     *
     * @param \AppBundle\Entity\Produit $numprod
     *
     * @return Sousproduit
     */
    public function setNumprod(\AppBundle\Entity\Produit $numprod = null)
    {
        $this->numprod = $numprod;

        return $this;
    }

    /**
     * Get numprod
     *
     * @return \AppBundle\Entity\Produit
     */
    public function getNumprod()
    {
        return $this->numprod;
    }
    
    public function __toString() {
        return "".$this->getNumsousprod();
    }
}
