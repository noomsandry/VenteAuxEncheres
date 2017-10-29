<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatResanal
 *
 * @ORM\Table(name="pat_resanal", indexes={@ORM\Index(name="i_fk_pat_resanal_resultat_anal", columns={"numresultatanal"}), @ORM\Index(name="i_fk_pat_resanal_patient", columns={"numpat", "datepat"}), @ORM\Index(name="IDX_EE443BCF43D087B", columns={"numpat"})})
 * @ORM\Entity
 */
class PatResanal
{
    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepat", type="date")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $datepat;

    /**
     * @var \AppBundle\Entity\ResultatAnal
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\ResultatAnal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numresultatanal", referencedColumnName="numresultatanal")
     * })
     */
    private $numresultatanal;

    /**
     * @var \AppBundle\Entity\Patient
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Patient")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numpat", referencedColumnName="numpat")
     * })
     */
    private $numpat;



    /**
     * Set datepat
     *
     * @param \DateTime $datepat
     *
     * @return PatResanal
     */
    public function setDatepat($datepat)
    {
        $this->datepat = $datepat;

        return $this;
    }

    /**
     * Get datepat
     *
     * @return \DateTime
     */
    public function getDatepat()
    {
        return $this->datepat;
    }

    /**
     * Set numresultatanal
     *
     * @param \AppBundle\Entity\ResultatAnal $numresultatanal
     *
     * @return PatResanal
     */
    public function setNumresultatanal(\AppBundle\Entity\ResultatAnal $numresultatanal = null)
    {
        $this->numresultatanal = $numresultatanal;

        return $this;
    }

    /**
     * Get numresultatanal
     *
     * @return \AppBundle\Entity\ResultatAnal
     */
    public function getNumresultatanal()
    {
        return $this->numresultatanal;
    }

    /**
     * Set numpat
     *
     * @param \AppBundle\Entity\Patient $numpat
     *
     * @return PatResanal
     */
    public function setNumpat(\AppBundle\Entity\Patient $numpat = null)
    {
        $this->numpat = $numpat;

        return $this;
    }

    /**
     * Get numpat
     *
     * @return \AppBundle\Entity\Patient
     */
    public function getNumpat()
    {
        return "".$this->numpat;
    }
}
