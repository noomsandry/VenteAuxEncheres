<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etablissement
 *
 * @ORM\Table(name="etablissement")
 * @ORM\Entity
 */
class Etablissement
{
    /**
     * @var string
     *
     * @ORM\Column(name="nometab", type="string", length=32, nullable=false)
     */
    private $nometab;

    /**
     * @var integer
     *
     * @ORM\Column(name="numetab", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numetab;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Personne", mappedBy="numetab")
     */
    private $personne;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->personne = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nometab
     *
     * @param string $nometab
     *
     * @return Etablissement
     */
    public function setNometab($nometab)
    {
        $this->nometab = $nometab;

        return $this;
    }

    /**
     * Get nometab
     *
     * @return string
     */
    public function getNometab()
    {
        return $this->nometab;
    }

    /**
     * Get numetab
     *
     * @return integer
     */
    public function getNumetab()
    {
        return $this->numetab;
    }

    /**
     * Add personne
     *
     * @param \AppBundle\Entity\Personne $personne
     *
     * @return Etablissement
     */
    public function addPersonne(\AppBundle\Entity\Personne $personne)
    {
        $this->personne[] = $personne;

        return $this;
    }

    /**
     * Remove personne
     *
     * @param \AppBundle\Entity\Personne $personne
     */
    public function removePersonne(\AppBundle\Entity\Personne $personne)
    {
        $this->personne->removeElement($personne);
    }

    /**
     * Get personne
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonne()
    {
        return $this->personne;
    }
    
    public function __toString() {
        return $this->getNometab();
    }
}
