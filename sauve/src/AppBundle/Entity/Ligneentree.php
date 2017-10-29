<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ligneentree
 *
 * @ORM\Table(name="ligneentree", indexes={@ORM\Index(name="i_fk_ligneentree_cmdfrs", columns={"numcmdfrs"}), @ORM\Index(name="i_fk_ligneentree_sousproduit", columns={"numsousprod"})})
 * @ORM\Entity
 */
class Ligneentree
{
    /**
     * @var integer
     *
     * @ORM\Column(name="qteentree", type="bigint", nullable=false)
     */
    private $qteentree;

    /**
     * @var integer
     *
     * @ORM\Column(name="numlingeentree", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numlingeentree;

    /**
     * @var \AppBundle\Entity\Cmdfrs
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Cmdfrs",inversedBy="ligneentree")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numcmdfrs", referencedColumnName="numcmdfrs")
     * })
     */
    private $numcmdfrs;

    /**
     * @var \AppBundle\Entity\Sousproduit
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Sousproduit",inversedBy="ligneentree")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numsousprod", referencedColumnName="numsousprod")
     * })
     */
    private $numsousprod;



    /**
     * Set qteentree
     *
     * @param integer $qteentree
     *
     * @return Ligneentree
     */
    public function setQteentree($qteentree)
    {
        $this->qteentree = $qteentree;

        return $this;
    }

    /**
     * Get qteentree
     *
     * @return integer
     */
    public function getQteentree()
    {
        return $this->qteentree;
    }

    /**
     * Get numlingeentree
     *
     * @return integer
     */
    public function getNumlingeentree()
    {
        return $this->numlingeentree;
    }

    /**
     * Set numcmdfrs
     *
     * @param \AppBundle\Entity\Cmdfrs $numcmdfrs
     *
     * @return Ligneentree
     */
    public function setNumcmdfrs(\AppBundle\Entity\Cmdfrs $numcmdfrs = null)
    {
        $this->numcmdfrs = $numcmdfrs;

        return $this;
    }

    /**
     * Get numcmdfrs
     *
     * @return \AppBundle\Entity\Cmdfrs
     */
    public function getNumcmdfrs()
    {
        return $this->numcmdfrs;
    }

    /**
     * Set numsousprod
     *
     * @param \AppBundle\Entity\Sousproduit $numsousprod
     *
     * @return Ligneentree
     */
    public function setNumsousprod(\AppBundle\Entity\Sousproduit $numsousprod = null)
    {
        $this->numsousprod = $numsousprod;

        return $this;
    }

    /**
     * Get numsousprod
     *
     * @return \AppBundle\Entity\Sousproduit
     */
    public function getNumsousprod()
    {
        return $this->numsousprod;
    }
}
