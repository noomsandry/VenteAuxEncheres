<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity
 */
class Produit
{
    /**
     * @var string
     *
     * @ORM\Column(name="designationprod", type="string", length=32, nullable=false)
     */
    private $designationprod;

    /**
     * @var integer
     *
     * @ORM\Column(name="numprod", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numprod;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Consommable", mappedBy="numprod")
     */
    private $consommable;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Reactif", mappedBy="numprod")
     */
    private $reactif;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Sousproduit", mappedBy="numprod")
     */
    private $sousproduit;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->consommable = new \Doctrine\Common\Collections\ArrayCollection();
        $this->reactif = new \Doctrine\Common\Collections\ArrayCollection();
        $this->sousproduit = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set designationprod
     *
     * @param string $designationprod
     *
     * @return Produit
     */
    public function setDesignationprod($designationprod)
    {
        $this->designationprod = $designationprod;

        return $this;
    }

    /**
     * Get designationprod
     *
     * @return string
     */
    public function getDesignationprod()
    {
        return $this->designationprod;
    }

    /**
     * Get numprod
     *
     * @return integer
     */
    public function getNumprod()
    {
        return $this->numprod;
    }

    /**
     * Add consommable
     *
     * @param \AppBundle\Entity\Consommable $consommable
     *
     * @return Produit
     */
    public function addConsommable(\AppBundle\Entity\Consommable $consommable)
    {
        $this->consommable[] = $consommable;

        return $this;
    }

    /**
     * Remove consommable
     *
     * @param \AppBundle\Entity\Consommable $consommable
     */
    public function removeConsommable(\AppBundle\Entity\Consommable $consommable)
    {
        $this->consommable->removeElement($consommable);
    }

    /**
     * Get consommable
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getConsommable()
    {
        return $this->consommable;
    }

    /**
     * Add reactif
     *
     * @param \AppBundle\Entity\Reactif $reactif
     *
     * @return Produit
     */
    public function addReactif(\AppBundle\Entity\Reactif $reactif)
    {
        $this->reactif[] = $reactif;

        return $this;
    }

    /**
     * Remove reactif
     *
     * @param \AppBundle\Entity\Reactif $reactif
     */
    public function removeReactif(\AppBundle\Entity\Reactif $reactif)
    {
        $this->reactif->removeElement($reactif);
    }

    /**
     * Get reactif
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReactif()
    {
        return $this->reactif;
    }

    /**
     * Add sousproduit
     *
     * @param \AppBundle\Entity\Sousproduit $sousproduit
     *
     * @return Produit
     */
    public function addSousproduit(\AppBundle\Entity\Sousproduit $sousproduit)
    {
        $this->sousproduit[] = $sousproduit;

        return $this;
    }

    /**
     * Remove sousproduit
     *
     * @param \AppBundle\Entity\Sousproduit $sousproduit
     */
    public function removeSousproduit(\AppBundle\Entity\Sousproduit $sousproduit)
    {
        $this->sousproduit->removeElement($sousproduit);
    }

    /**
     * Get sousproduit
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSousproduit()
    {
        return $this->sousproduit;
    }
    
    public function __toString() {
        return $this->getDesignationprod();
    }
}
