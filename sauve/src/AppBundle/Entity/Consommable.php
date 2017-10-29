<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consommable
 *
 * @ORM\Table(name="consommable", indexes={@ORM\Index(name="i_fk_consommable_produit", columns={"numprod"})})
 * @ORM\Entity
 */
class Consommable
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomconso", type="string", length=32, nullable=false)
     */
    private $nomconso;

    /**
     * @var string
     *
     * @ORM\Column(name="designationprod", type="string", length=32, nullable=false)
     */
    private $designationprod;

    /**
     * @var integer
     *
     * @ORM\Column(name="numconso", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numconso;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manipuler", mappedBy="numconso")
     */
    private $manipuler;

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
        $this->manipuler = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomconso
     *
     * @param string $nomconso
     *
     * @return Consommable
     */
    public function setNomconso($nomconso)
    {
        $this->nomconso = $nomconso;

        return $this;
    }

    /**
     * Get nomconso
     *
     * @return string
     */
    public function getNomconso()
    {
        return $this->nomconso;
    }

    /**
     * Set designationprod
     *
     * @param string $designationprod
     *
     * @return Consommable
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
     * Get numconso
     *
     * @return integer
     */
    public function getNumconso()
    {
        return $this->numconso;
    }

    /**
     * Add manipuler
     *
     * @param \AppBundle\Entity\Manipuler $manipuler
     *
     * @return Consommable
     */
    public function addManipuler(\AppBundle\Entity\Manipuler $manipuler)
    {
        $this->manipuler[] = $manipuler;

        return $this;
    }

    /**
     * Remove manipuler
     *
     * @param \AppBundle\Entity\Manipuler $manipuler
     */
    public function removeManipuler(\AppBundle\Entity\Manipuler $manipuler)
    {
        $this->manipuler->removeElement($manipuler);
    }

    /**
     * Get manipuler
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManipuler()
    {
        return $this->manipuler;
    }

    /**
     * Set numprod
     *
     * @param \AppBundle\Entity\Produit $numprod
     *
     * @return Consommable
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
}
