<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PatPrelev
 *
 * @ORM\Table(name="pat_prelev", indexes={@ORM\Index(name="i_fk_pat_prelev_prelevement", columns={"numprelev"}), @ORM\Index(name="i_fk_pat_prelev_patient", columns={"numpat", "datepat"}), @ORM\Index(name="IDX_C7B5BECD43D087B", columns={"numpat"})})
 * @ORM\Entity
 */
class PatPrelev
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
     * @var \AppBundle\Entity\Prelevement
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Prelevement")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numprelev", referencedColumnName="numprelev")
     * })
     */
    private $numprelev;

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
     * @return PatPrelev
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
     * Set numprelev
     *
     * @param \AppBundle\Entity\Prelevement $numprelev
     *
     * @return PatPrelev
     */
    public function setNumprelev(\AppBundle\Entity\Prelevement $numprelev = null)
    {
        $this->numprelev = $numprelev;

        return $this;
    }

    /**
     * Get numprelev
     *
     * @return \AppBundle\Entity\Prelevement
     */
    public function getNumprelev()
    {
        return $this->numprelev;
    }

    /**
     * Set numpat
     *
     * @param \AppBundle\Entity\Patient $numpat
     *
     * @return PatPrelev
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
