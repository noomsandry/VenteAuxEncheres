<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Manipuler
 *
 * @ORM\Table(name="manipuler", indexes={@ORM\Index(name="i_fk_manipuler_patient", columns={"numpat", "datepat"}), @ORM\Index(name="i_fk_manipuler_consommable", columns={"numconso"}), @ORM\Index(name="IDX_E169B68543D087B", columns={"numpat"})})
 * @ORM\Entity
 */
class Manipuler
{
    /**
     * @var integer
     *
     * @ORM\Column(name="qtesortieconso", type="integer", nullable=false)
     */
    private $qtesortieconso;

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
     * @var \AppBundle\Entity\Consommable
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Consommable")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numconso", referencedColumnName="numconso")
     * })
     */
    private $numconso;



    /**
     * Set qtesortieconso
     *
     * @param integer $qtesortieconso
     *
     * @return Manipuler
     */
    public function setQtesortieconso($qtesortieconso)
    {
        $this->qtesortieconso = $qtesortieconso;

        return $this;
    }

    /**
     * Get qtesortieconso
     *
     * @return integer
     */
    public function getQtesortieconso()
    {
        return $this->qtesortieconso;
    }

    /**
     * Set datepat
     *
     * @param \DateTime $datepat
     *
     * @return Manipuler
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
     * @return Manipuler
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
     * Set numconso
     *
     * @param \AppBundle\Entity\Consommable $numconso
     *
     * @return Manipuler
     */
    public function setNumconso(\AppBundle\Entity\Consommable $numconso = null)
    {
        $this->numconso = $numconso;

        return $this;
    }

    /**
     * Get numconso
     *
     * @return \AppBundle\Entity\Consommable
     */
    public function getNumconso()
    {
        return "".$this->numconso;
    }
}
