<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unite
 *
 * @ORM\Table(name="unite")
 * @ORM\Entity
 */
class Unite
{
    /**
     * @var string
     *
     * @ORM\Column(name="libelleunit", type="string", length=10, nullable=false)
     */
    private $libelleunit;

    /**
     * @var integer
     *
     * @ORM\Column(name="numunit", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numunit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Analyse", mappedBy="numunit")
     */
    private $analyse;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->analyse = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set libelleunit
     *
     * @param string $libelleunit
     *
     * @return Unite
     */
    public function setLibelleunit($libelleunit)
    {
        $this->libelleunit = $libelleunit;

        return $this;
    }

    /**
     * Get libelleunit
     *
     * @return string
     */
    public function getLibelleunit()
    {
        return $this->libelleunit;
    }

    /**
     * Get numunit
     *
     * @return integer
     */
    public function getNumunit()
    {
        return $this->numunit;
    }

    /**
     * Add analyse
     *
     * @param \AppBundle\Entity\Analyse $analyse
     *
     * @return Unite
     */
    public function addAnalyse(\AppBundle\Entity\Analyse $analyse)
    {
        $this->analyse[] = $analyse;

        return $this;
    }

    /**
     * Remove analyse
     *
     * @param \AppBundle\Entity\Analyse $analyse
     */
    public function removeAnalyse(\AppBundle\Entity\Analyse $analyse)
    {
        $this->analyse->removeElement($analyse);
    }

    /**
     * Get analyse
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAnalyse()
    {
        return $this->analyse;
    }
}
