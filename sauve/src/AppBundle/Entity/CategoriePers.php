<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategoriePers
 *
 * @ORM\Table(name="categorie_pers")
 * @ORM\Entity
 */
class CategoriePers
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomcategpers", type="string", length=32, nullable=false)
     */
    private $nomcategpers;

    /**
     * @var integer
     *
     * @ORM\Column(name="numcategpers", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numcategpers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Personne", mappedBy="numcategpers")
     */
    private $numpers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numpers = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomcategpers
     *
     * @param string $nomcategpers
     *
     * @return CategoriePers
     */
    public function setNomcategpers($nomcategpers)
    {
        $this->nomcategpers = $nomcategpers;

        return $this;
    }

    /**
     * Get nomcategpers
     *
     * @return string
     */
    public function getNomcategpers()
    {
        return $this->nomcategpers;
    }

    /**
     * Get numcategpers
     *
     * @return integer
     */
    public function getNumcategpers()
    {
        return $this->numcategpers;
    }

    /**
     * Add numper
     *
     * @param \AppBundle\Entity\Personne $numper
     *
     * @return CategoriePers
     */
    public function addNumper(\AppBundle\Entity\Personne $numper)
    {
        $this->numpers[] = $numper;

        return $this;
    }

    /**
     * Remove numper
     *
     * @param \AppBundle\Entity\Personne $numper
     */
    public function removeNumper(\AppBundle\Entity\Personne $numper)
    {
        $this->numpers->removeElement($numper);
    }

    /**
     * Get numpers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumpers()
    {
        return $this->numpers;
    }
}
