<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Personne
 *
 * @ORM\Table(name="personne", indexes={@ORM\Index(name="i_fk_personne_etablissement", columns={"numetab"})})
 * @ORM\Entity
 */
class Personne
{
    /**
     * @var string
     *
     * @ORM\Column(name="nompers", type="string", length=32, nullable=false)
     */
    private $nompers;

    /**
     * @var string
     *
     * @ORM\Column(name="prenompers", type="string", length=32, nullable=false)
     */
    private $prenompers;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datenaispers", type="date", nullable=false)
     */
    private $datenaispers;

    /**
     * @var string
     *
     * @ORM\Column(name="adressepers", type="string", length=32, nullable=true)
     */
    private $adressepers;

    /**
     * @var integer
     *
     * @ORM\Column(name="numpers", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numpers;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Patient", mappedBy="numpers")
     */
    private $patient;

    /**
     * @var \AppBundle\Entity\Etablissement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Etablissement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numetab", referencedColumnName="numetab")
     * })
     */
    private $numetab;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CategoriePers", inversedBy="numpers")
     * @ORM\JoinTable(name="pers_categpers",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numpers", referencedColumnName="numpers")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numcategpers", referencedColumnName="numcategpers")
     *   }
     * )
     */
    private $numcategpers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patient = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numcategpers = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nompers
     *
     * @param string $nompers
     *
     * @return Personne
     */
    public function setNompers($nompers)
    {
        $this->nompers = $nompers;

        return $this;
    }

    /**
     * Get nompers
     *
     * @return string
     */
    public function getNompers()
    {
        return $this->nompers;
    }

    /**
     * Set prenompers
     *
     * @param string $prenompers
     *
     * @return Personne
     */
    public function setPrenompers($prenompers)
    {
        $this->prenompers = $prenompers;

        return $this;
    }

    /**
     * Get prenompers
     *
     * @return string
     */
    public function getPrenompers()
    {
        return $this->prenompers;
    }

    /**
     * Set datenaispers
     *
     * @param \DateTime $datenaispers
     *
     * @return Personne
     */
    public function setDatenaispers($datenaispers)
    {
        $this->datenaispers = $datenaispers;

        return $this;
    }

    /**
     * Get datenaispers
     *
     * @return \DateTime
     */
    public function getDatenaispers()
    {
        return $this->datenaispers;
    }

    /**
     * Set adressepers
     *
     * @param string $adressepers
     *
     * @return Personne
     */
    public function setAdressepers($adressepers)
    {
        $this->adressepers = $adressepers;

        return $this;
    }

    /**
     * Get adressepers
     *
     * @return string
     */
    public function getAdressepers()
    {
        return $this->adressepers;
    }

    /**
     * Get numpers
     *
     * @return integer
     */
    public function getNumpers()
    {
        return $this->numpers;
    }

    /**
     * Add patient
     *
     * @param \AppBundle\Entity\Patient $patient
     *
     * @return Personne
     */
    public function addPatient(\AppBundle\Entity\Patient $patient)
    {
        $this->patient[] = $patient;

        return $this;
    }

    /**
     * Remove patient
     *
     * @param \AppBundle\Entity\Patient $patient
     */
    public function removePatient(\AppBundle\Entity\Patient $patient)
    {
        $this->patient->removeElement($patient);
    }

    /**
     * Get patient
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatient()
    {
        return $this->patient;
    }

    /**
     * Set numetab
     *
     * @param \AppBundle\Entity\Etablissement $numetab
     *
     * @return Personne
     */
    public function setNumetab(\AppBundle\Entity\Etablissement $numetab = null)
    {
        $this->numetab = $numetab;

        return $this;
    }

    /**
     * Get numetab
     *
     * @return \AppBundle\Entity\Etablissement
     */
    public function getNumetab()
    {
        return $this->numetab;
    }

    /**
     * Add numcategper
     *
     * @param \AppBundle\Entity\CategoriePers $numcategper
     *
     * @return Personne
     */
    public function addNumcategper(\AppBundle\Entity\CategoriePers $numcategper)
    {
        $this->numcategpers[] = $numcategper;

        return $this;
    }

    /**
     * Remove numcategper
     *
     * @param \AppBundle\Entity\CategoriePers $numcategper
     */
    public function removeNumcategper(\AppBundle\Entity\CategoriePers $numcategper)
    {
        $this->numcategpers->removeElement($numcategper);
    }

    /**
     * Get numcategpers
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumcategpers()
    {
        return $this->numcategpers;
    }
    
    public function __toString() {
        return $this->getNompers()." ".$this->getPrenompers();
    }
}
