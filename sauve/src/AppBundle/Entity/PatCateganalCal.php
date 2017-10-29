<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatCateganalCal
 *
 * @ORM\Table(name="pat_categanal_cal", indexes={@ORM\Index(name="i_fk_pat_categanal_cal_patient", columns={"numpat", "datepat"}), @ORM\Index(name="i_fk_pat_categanal_cal_categ_anal", columns={"numcateganal"}), @ORM\Index(name="IDX_3F8BBB9543D087B", columns={"numpat"})})
 * @ORM\Entity
 */
class PatCateganalCal
{
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
     * @var \AppBundle\Entity\CategAnal
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\CategAnal")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numcateganal", referencedColumnName="numcateganal")
     * })
     */
    private $numcateganal;



    /**
     * @var \DateTime
     *
     * @ORM\Column(name="datepat", type="date")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="NONE")
     */
    private $datepat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="interpretationcateganal", type="string", length=32, nullable=true)
     */
    private $interpretationcateganal;

    
    /**
     * Set interpretationcateganal
     *
     * @param string $interpretationcateganal
     *
     * @return PatCateganalCal
     */
    public function setInterpretationcateganal($interpretationcateganal)
    {
        $this->interpretationcateganal = $interpretationcateganal;

        return $this;
    }

    /**
     * Get interpretationcateganal
     *
     * @return string
     */
    public function getInterpretationcateganal()
    {
        return $this->interpretationcateganal;
    }

    /**
     * Set datepat
     *
     * @param \DateTime $datepat
     *
     * @return PatCateganalCal
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
     * @return PatCateganalCal
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
     * Set numcateganal
     *
     * @param \AppBundle\Entity\CategAnal $numcateganal
     *
     * @return PatCateganalCal
     */
    public function setNumcateganal(\AppBundle\Entity\CategAnal $numcateganal = null)
    {
        $this->numcateganal = $numcateganal;

        return $this;
    }

    /**
     * Get numcateganal
     *
     * @return \AppBundle\Entity\CategAnal
     */
    public function getNumcateganal()
    {
        return "".$this->numcateganal;
    }
}
