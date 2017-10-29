<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ResultatAnal
 *
 * @ORM\Table(name="resultat_anal")
 * @ORM\Entity
 */
class ResultatAnal
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateresultatanal", type="date", nullable=true)
     */
    private $dateresultatanal;

    /**
     * @var integer
     *
     * @ORM\Column(name="numresultatanal", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numresultatanal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatResanal", mappedBy="numresultatanal")
     */
    private $patResanal;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patResanal = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set dateresultatanal
     *
     * @param \DateTime $dateresultatanal
     *
     * @return ResultatAnal
     */
    public function setDateresultatanal($dateresultatanal)
    {
        $this->dateresultatanal = $dateresultatanal;

        return $this;
    }

    /**
     * Get dateresultatanal
     *
     * @return \DateTime
     */
    public function getDateresultatanal()
    {
        return $this->dateresultatanal;
    }

    /**
     * Get numresultatanal
     *
     * @return integer
     */
    public function getNumresultatanal()
    {
        return $this->numresultatanal;
    }

    /**
     * Add patResanal
     *
     * @param \AppBundle\Entity\PatResanal $patResanal
     *
     * @return ResultatAnal
     */
    public function addPatResanal(\AppBundle\Entity\PatResanal $patResanal)
    {
        $this->patResanal[] = $patResanal;

        return $this;
    }

    /**
     * Remove patResanal
     *
     * @param \AppBundle\Entity\PatResanal $patResanal
     */
    public function removePatResanal(\AppBundle\Entity\PatResanal $patResanal)
    {
        $this->patResanal->removeElement($patResanal);
    }

    /**
     * Get patResanal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatResanal()
    {
        return $this->patResanal;
    }
    
    public function __toString() {
        return "".$this->getNumresultatanal();
    }
}
