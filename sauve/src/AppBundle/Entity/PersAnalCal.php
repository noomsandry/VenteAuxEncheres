<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PersAnalCal
 *
 * @ORM\Table(name="pers_anal_cal", indexes={@ORM\Index(name="i_fk_pers_anal_cal_patient", columns={"numpat", "datepat"}), @ORM\Index(name="i_fk_pers_anal_cal_analyse", columns={"numanal"}), @ORM\Index(name="IDX_AA15B62643D087B", columns={"numpat"})})
 * @ORM\Entity
 */
class PersAnalCal
{
    /**
     * @var string
     *
     * @ORM\Column(name="interpretation", type="string", length=32, nullable=true)
     */
    private $interpretation;

    /**
     * @var string
     *
     * @ORM\Column(name="germeidentifie", type="string", length=32, nullable=true)
     */
    private $germeidentifie;

    /**
     * @var string
     *
     * @ORM\Column(name="etudeantibio", type="string", length=32, nullable=true)
     */
    private $etudeantibio;

    /**
     * @var string
     *
     * @ORM\Column(name="resultatanal", type="string", length=32, nullable=true)
     */
    private $resultatanal;

    /**
     * @var string
     *
     * @ORM\Column(name="conclusionanal", type="string", length=50, nullable=true)
     */
    private $conclusionanal;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepat", type="date")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $datepat;

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
     * @var \AppBundle\Entity\Analyse
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Analyse")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numanal", referencedColumnName="numanal")
     * })
     */
    private $numanal;



    /**
     * Set interpretation
     *
     * @param string $interpretation
     *
     * @return PersAnalCal
     */
    public function setInterpretation($interpretation)
    {
        $this->interpretation = $interpretation;

        return $this;
    }

    /**
     * Get interpretation
     *
     * @return string
     */
    public function getInterpretation()
    {
        return $this->interpretation;
    }

    /**
     * Set germeidentifie
     *
     * @param string $germeidentifie
     *
     * @return PersAnalCal
     */
    public function setGermeidentifie($germeidentifie)
    {
        $this->germeidentifie = $germeidentifie;

        return $this;
    }

    /**
     * Get germeidentifie
     *
     * @return string
     */
    public function getGermeidentifie()
    {
        return $this->germeidentifie;
    }

    /**
     * Set etudeantibio
     *
     * @param string $etudeantibio
     *
     * @return PersAnalCal
     */
    public function setEtudeantibio($etudeantibio)
    {
        $this->etudeantibio = $etudeantibio;

        return $this;
    }

    /**
     * Get etudeantibio
     *
     * @return string
     */
    public function getEtudeantibio()
    {
        return $this->etudeantibio;
    }

    /**
     * Set resultatanal
     *
     * @param string $resultatanal
     *
     * @return PersAnalCal
     */
    public function setResultatanal($resultatanal)
    {
        $this->resultatanal = $resultatanal;

        return $this;
    }

    /**
     * Get resultatanal
     *
     * @return string
     */
    public function getResultatanal()
    {
        return $this->resultatanal;
    }

    /**
     * Set conclusionanal
     *
     * @param string $conclusionanal
     *
     * @return PersAnalCal
     */
    public function setConclusionanal($conclusionanal)
    {
        $this->conclusionanal = $conclusionanal;

        return $this;
    }

    /**
     * Get conclusionanal
     *
     * @return string
     */
    public function getConclusionanal()
    {
        return $this->conclusionanal;
    }

    /**
     * Set datepat
     *
     * @param \DateTime $datepat
     *
     * @return PersAnalCal
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
     * Set numpat
     *
     * @param \AppBundle\Entity\Patient $numpat
     *
     * @return PersAnalCal
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
        return $this->numpat;
    }

    /**
     * Set numanal
     *
     * @param \AppBundle\Entity\Analyse $numanal
     *
     * @return PersAnalCal
     */
    public function setNumanal(\AppBundle\Entity\Analyse $numanal = null)
    {
        $this->numanal = $numanal;

        return $this;
    }

    /**
     * Get numanal
     *
     * @return \AppBundle\Entity\Analyse
     */
    public function getNumanal()
    {
        return "".$this->numanal;
    }
}
