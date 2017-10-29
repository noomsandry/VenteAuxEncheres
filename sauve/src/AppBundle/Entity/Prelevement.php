<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Prelevement
 *
 * @ORM\Table(name="prelevement")
 * @ORM\Entity
 */
class Prelevement
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateheureprelev", type="datetime", nullable=false)
     */
    private $dateheureprelev;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateheurearriv", type="datetime", nullable=true)
     */
    private $dateheurearriv;

    /**
     * @var integer
     *
     * @ORM\Column(name="numprelev", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numprelev;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatPrelev", mappedBy="numprelev")
     */
    private $patPrelev;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GroupeAnal", mappedBy="numprelev")
     */
    private $numgroupeanal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patPrelev = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numgroupeanal = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set dateheureprelev
     *
     * @param \DateTime $dateheureprelev
     *
     * @return Prelevement
     */
    public function setDateheureprelev($dateheureprelev)
    {
        $this->dateheureprelev = $dateheureprelev;

        return $this;
    }

    /**
     * Get dateheureprelev
     *
     * @return \DateTime
     */
    public function getDateheureprelev()
    {
        return $this->dateheureprelev;
    }

    /**
     * Set dateheurearriv
     *
     * @param \DateTime $dateheurearriv
     *
     * @return Prelevement
     */
    public function setDateheurearriv($dateheurearriv)
    {
        $this->dateheurearriv = $dateheurearriv;

        return $this;
    }

    /**
     * Get dateheurearriv
     *
     * @return \DateTime
     */
    public function getDateheurearriv()
    {
        return $this->dateheurearriv;
    }

    /**
     * Get numprelev
     *
     * @return integer
     */
    public function getNumprelev()
    {
        return $this->numprelev;
    }

    /**
     * Add patPrelev
     *
     * @param \AppBundle\Entity\PatPrelev $patPrelev
     *
     * @return Prelevement
     */
    public function addPatPrelev(\AppBundle\Entity\PatPrelev $patPrelev)
    {
        $this->patPrelev[] = $patPrelev;

        return $this;
    }

    /**
     * Remove patPrelev
     *
     * @param \AppBundle\Entity\PatPrelev $patPrelev
     */
    public function removePatPrelev(\AppBundle\Entity\PatPrelev $patPrelev)
    {
        $this->patPrelev->removeElement($patPrelev);
    }

    /**
     * Get patPrelev
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatPrelev()
    {
        return $this->patPrelev;
    }

    /**
     * Add numgroupeanal
     *
     * @param \AppBundle\Entity\GroupeAnal $numgroupeanal
     *
     * @return Prelevement
     */
    public function addNumgroupeanal(\AppBundle\Entity\GroupeAnal $numgroupeanal)
    {
        $this->numgroupeanal[] = $numgroupeanal;

        return $this;
    }

    /**
     * Remove numgroupeanal
     *
     * @param \AppBundle\Entity\GroupeAnal $numgroupeanal
     */
    public function removeNumgroupeanal(\AppBundle\Entity\GroupeAnal $numgroupeanal)
    {
        $this->numgroupeanal->removeElement($numgroupeanal);
    }

    /**
     * Get numgroupeanal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumgroupeanal()
    {
        return "".$this->numgroupeanal;
    }
}
