<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReferenceAnal
 *
 * @ORM\Table(name="reference_anal")
 * @ORM\Entity
 */
class ReferenceAnal
{
    /**
     * @var string
     *
     * @ORM\Column(name="libellerefanal", type="string", length=32, nullable=true)
     */
    private $libellerefanal;

    /**
     * @var integer
     *
     * @ORM\Column(name="numrefanal", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numrefanal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Analyse", mappedBy="numrefanal")
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
     * Set libellerefanal
     *
     * @param string $libellerefanal
     *
     * @return ReferenceAnal
     */
    public function setLibellerefanal($libellerefanal)
    {
        $this->libellerefanal = $libellerefanal;

        return $this;
    }

    /**
     * Get libellerefanal
     *
     * @return string
     */
    public function getLibellerefanal()
    {
        return $this->libellerefanal;
    }

    /**
     * Get numrefanal
     *
     * @return integer
     */
    public function getNumrefanal()
    {
        return $this->numrefanal;
    }

    /**
     * Add numanal
     *
     * @param \AppBundle\Entity\Analyse $numanal
     *
     * @return ReferenceAnal
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
        return $this->getLibellerefanal();
    }
}
