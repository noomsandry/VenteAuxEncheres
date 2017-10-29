<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatElemCal
 *
 * @ORM\Table(name="pat_elem_cal", indexes={@ORM\Index(name="i_fk_pat_elem_cal_patient", columns={"numpat", "datepat"}), @ORM\Index(name="i_fk_pat_elem_cal_element", columns={"numelem"}), @ORM\Index(name="IDX_90171D6543D087B", columns={"numpat"})})
 * @ORM\Entity
 */
class PatElemCal
{
    /**
     * @var string
     *
     * @ORM\Column(name="resultatelem", type="string", length=32, nullable=false)
     */
    private $resultatelem;

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
     * @var \AppBundle\Entity\Element
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Element")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numelem", referencedColumnName="numelem")
     * })
     */
    private $numelem;



    /**
     * Set resultatelem
     *
     * @param string $resultatelem
     *
     * @return PatElemCal
     */
    public function setResultatelem($resultatelem)
    {
        $this->resultatelem = $resultatelem;

        return $this;
    }

    /**
     * Get resultatelem
     *
     * @return string
     */
    public function getResultatelem()
    {
        return $this->resultatelem;
    }

    /**
     * Set datepat
     *
     * @param \DateTime $datepat
     *
     * @return PatElemCal
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
     * @return PatElemCal
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
     * Set numelem
     *
     * @param \AppBundle\Entity\Element $numelem
     *
     * @return PatElemCal
     */
    public function setNumelem(\AppBundle\Entity\Element $numelem = null)
    {
        $this->numelem = $numelem;

        return $this;
    }

    /**
     * Get numelem
     *
     * @return \AppBundle\Entity\Element
     */
    public function getNumelem()
    {
        return "".$this->numelem;
    }
}
