<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategAnal
 *
 * @ORM\Table(name="categ_anal")
 * @ORM\Entity
 */
class CategAnal
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomcateganal", type="string", length=32, nullable=false)
     */
    private $nomcateganal;

    /**
     * @var integer
     *
     * @ORM\Column(name="numcateganal", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numcateganal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatCateganalCal", mappedBy="numcateganal")
     */
    private $patCateganalCal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Analyse", mappedBy="numcateganal")
     */
    private $numanal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patCateganalCal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numanal = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomcateganal
     *
     * @param string $nomcateganal
     *
     * @return CategAnal
     */
    public function setNomcateganal($nomcateganal)
    {
        $this->nomcateganal = $nomcateganal;

        return $this;
    }

    /**
     * Get nomcateganal
     *
     * @return string
     */
    public function getNomcateganal()
    {
        return $this->nomcateganal;
    }

    /**
     * Get numcateganal
     *
     * @return integer
     */
    public function getNumcateganal()
    {
        return $this->numcateganal;
    }

    /**
     * Add patCateganalCal
     *
     * @param \AppBundle\Entity\PatCateganalCal $patCateganalCal
     *
     * @return CategAnal
     */
    public function addPatCateganalCal(\AppBundle\Entity\PatCateganalCal $patCateganalCal)
    {
        $this->patCateganalCal[] = $patCateganalCal;

        return $this;
    }

    /**
     * Remove patCateganalCal
     *
     * @param \AppBundle\Entity\PatCateganalCal $patCateganalCal
     */
    public function removePatCateganalCal(\AppBundle\Entity\PatCateganalCal $patCateganalCal)
    {
        $this->patCateganalCal->removeElement($patCateganalCal);
    }

    /**
     * Get patCateganalCal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatCateganalCal()
    {
        return $this->patCateganalCal;
    }

    /**
     * Add numanal
     *
     * @param \AppBundle\Entity\Analyse $numanal
     *
     * @return CategAnal
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
