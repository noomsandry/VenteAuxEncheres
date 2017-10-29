<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reactif
 *
 * @ORM\Table(name="reactif", indexes={@ORM\Index(name="i_fk_reactif_produit", columns={"numprod"})})
 * @ORM\Entity
 */
class Reactif
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomreact", type="string", length=32, nullable=false)
     */
    private $nomreact;

    /**
     * @var string
     *
     * @ORM\Column(name="designationprod", type="string", length=32, nullable=false)
     */
    private $designationprod;

    /**
     * @var integer
     *
     * @ORM\Column(name="numreact", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numreact;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Analyse", inversedBy="numreact")
     * @ORM\JoinTable(name="utiliser",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numreact", referencedColumnName="numreact")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numanal", referencedColumnName="numanal")
     *   }
     * )
     */
    private $numanal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numanal = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomreact
     *
     * @param string $nomreact
     *
     * @return Reactif
     */
    public function setNomreact($nomreact)
    {
        $this->nomreact = $nomreact;

        return $this;
    }

    /**
     * Get nomreact
     *
     * @return string
     */
    public function getNomreact()
    {
        return $this->nomreact;
    }

    /**
     * Set designationprod
     *
     * @param string $designationprod
     *
     * @return Reactif
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
     * Get numreact
     *
     * @return integer
     */
    public function getNumreact()
    {
        return $this->numreact;
    }

    /**
     * Set numprod
     *
     * @param \AppBundle\Entity\Produit $numprod
     *
     * @return Reactif
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

    /**
     * Add numanal
     *
     * @param \AppBundle\Entity\Analyse $numanal
     *
     * @return Reactif
     */
    public function addNumanal(\AppBundle\Entity\Analyse $numanal)
    {
        $this->numanal[] = $numanal;

        return $this;
    }

    /**
     * Remove numanal
     *
     * @param \AppBundle\Entity\Analyse $numanal
     */
    public function removeNumanal(\AppBundle\Entity\Analyse $numanal)
    {
        $this->numanal->removeElement($numanal);
    }

    /**
     * Get numanal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumanal()
    {
        return $this->numanal;
    }
}
