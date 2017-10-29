<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Patient
 *
 * @ORM\Table(name="patient", indexes={@ORM\Index(name="i_fk_patient_personne", columns={"numpers"})})
 * @ORM\Entity
 */
class Patient
{
    /**
     * @var string
     *
     * @ORM\Column(name="drprescri", type="string", length=32, nullable=false)
     */
    private $drprescri;

    /**
     * @var string
     *
     * @ORM\Column(name="renseigncli", type="string", length=32, nullable=true)
     */
    private $renseigncli;

    /**
     * @var integer
     *
     * @ORM\Column(name="numpat", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numpat;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Manipuler", mappedBy="numpat")
     */
    private $manipuler;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatCateganalCal", mappedBy="numpat")
     */
    private $patCateganalCal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatElemCal", mappedBy="numpat")
     */
    private $patElemCal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatPrelev", mappedBy="numpat")
     */
    private $patPrelev;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatResanal", mappedBy="numpat")
     */
    private $patResanal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PersAnalCal", mappedBy="numpat")
     */
    private $persAnalCal;

    /**
     * @var \AppBundle\Entity\Personne
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Personne")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numpers", referencedColumnName="numpers")
     * })
     */
    private $numpers;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->manipuler = new \Doctrine\Common\Collections\ArrayCollection();
        $this->patCateganalCal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->patElemCal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->patPrelev = new \Doctrine\Common\Collections\ArrayCollection();
        $this->patResanal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->persAnalCal = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set drprescri
     *
     * @param string $drprescri
     *
     * @return Patient
     */
    public function setDrprescri($drprescri)
    {
        $this->drprescri = $drprescri;

        return $this;
    }

    /**
     * Get drprescri
     *
     * @return string
     */
    public function getDrprescri()
    {
        return $this->drprescri;
    }

    /**
     * Set renseigncli
     *
     * @param string $renseigncli
     *
     * @return Patient
     */
    public function setRenseigncli($renseigncli)
    {
        $this->renseigncli = $renseigncli;

        return $this;
    }

    /**
     * Get renseigncli
     *
     * @return string
     */
    public function getRenseigncli()
    {
        return $this->renseigncli;
    }

    /**
     * Get numpat
     *
     * @return integer
     */
    public function getNumpat()
    {
        return $this->numpat;
    }

    /**
     * Add manipuler
     *
     * @param \AppBundle\Entity\Manipuler $manipuler
     *
     * @return Patient
     */
    public function addManipuler(\AppBundle\Entity\Manipuler $manipuler)
    {
        $this->manipuler[] = $manipuler;

        return $this;
    }

    /**
     * Remove manipuler
     *
     * @param \AppBundle\Entity\Manipuler $manipuler
     */
    public function removeManipuler(\AppBundle\Entity\Manipuler $manipuler)
    {
        $this->manipuler->removeElement($manipuler);
    }

    /**
     * Get manipuler
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getManipuler()
    {
        return $this->manipuler;
    }

    /**
     * Add patCateganalCal
     *
     * @param \AppBundle\Entity\PatCateganalCal $patCateganalCal
     *
     * @return Patient
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
     * Add patElemCal
     *
     * @param \AppBundle\Entity\PatElemCal $patElemCal
     *
     * @return Patient
     */
    public function addPatElemCal(\AppBundle\Entity\PatElemCal $patElemCal)
    {
        $this->patElemCal[] = $patElemCal;

        return $this;
    }

    /**
     * Remove patElemCal
     *
     * @param \AppBundle\Entity\PatElemCal $patElemCal
     */
    public function removePatElemCal(\AppBundle\Entity\PatElemCal $patElemCal)
    {
        $this->patElemCal->removeElement($patElemCal);
    }

    /**
     * Get patElemCal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPatElemCal()
    {
        return $this->patElemCal;
    }

    /**
     * Add patPrelev
     *
     * @param \AppBundle\Entity\PatPrelev $patPrelev
     *
     * @return Patient
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
     * Add patResanal
     *
     * @param \AppBundle\Entity\PatResanal $patResanal
     *
     * @return Patient
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

    /**
     * Add persAnalCal
     *
     * @param \AppBundle\Entity\PersAnalCal $persAnalCal
     *
     * @return Patient
     */
    public function addPersAnalCal(\AppBundle\Entity\PersAnalCal $persAnalCal)
    {
        $this->persAnalCal[] = $persAnalCal;

        return $this;
    }

    /**
     * Remove persAnalCal
     *
     * @param \AppBundle\Entity\PersAnalCal $persAnalCal
     */
    public function removePersAnalCal(\AppBundle\Entity\PersAnalCal $persAnalCal)
    {
        $this->persAnalCal->removeElement($persAnalCal);
    }

    /**
     * Get persAnalCal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersAnalCal()
    {
        return $this->persAnalCal;
    }

    /**
     * Set numpers
     *
     * @param \AppBundle\Entity\Personne $numpers
     *
     * @return Patient
     */
    public function setNumpers(\AppBundle\Entity\Personne $numpers = null)
    {
        $this->numpers = $numpers;

        return $this;
    }

    /**
     * Get numpers
     *
     * @return \AppBundle\Entity\Personne
     */
    public function getNumpers()
    {
        return $this->numpers;
    }
    
    public function __toString() {
        return "".$this->getNumpat();
    }
}
