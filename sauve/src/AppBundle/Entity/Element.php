<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Element
 *
 * @ORM\Table(name="element", indexes={@ORM\Index(name="i_fk_element_examen", columns={"numexam"})})
 * @ORM\Entity
 */
class Element
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomelem", type="string", length=32, nullable=false)
     */
    private $nomelem;

    /**
     * @var integer
     *
     * @ORM\Column(name="numelem", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numelem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PatElemCal", mappedBy="numelem")
     */
    private $patElemCal;

    /**
     * @var \AppBundle\Entity\Examen
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Examen")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numexam", referencedColumnName="numexam")
     * })
     */
    private $numexam;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GroupeElem", mappedBy="numelem")
     */
    private $numgroupeelem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->patElemCal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numgroupeelem = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomelem
     *
     * @param string $nomelem
     *
     * @return Element
     */
    public function setNomelem($nomelem)
    {
        $this->nomelem = $nomelem;

        return $this;
    }

    /**
     * Get nomelem
     *
     * @return string
     */
    public function getNomelem()
    {
        return $this->nomelem;
    }

    /**
     * Get numelem
     *
     * @return integer
     */
    public function getNumelem()
    {
        return $this->numelem;
    }

    /**
     * Add patElemCal
     *
     * @param \AppBundle\Entity\PatElemCal $patElemCal
     *
     * @return Element
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
     * Set numexam
     *
     * @param \AppBundle\Entity\Examen $numexam
     *
     * @return Element
     */
    public function setNumexam(\AppBundle\Entity\Examen $numexam = null)
    {
        $this->numexam = $numexam;

        return $this;
    }

    /**
     * Get numexam
     *
     * @return \AppBundle\Entity\Examen
     */
    public function getNumexam()
    {
        return $this->numexam;
    }

    /**
     * Add numgroupeelem
     *
     * @param \AppBundle\Entity\GroupeElem $numgroupeelem
     *
     * @return Element
     */
    public function addNumgroupeelem(\AppBundle\Entity\GroupeElem $numgroupeelem)
    {
        $this->numgroupeelem[] = $numgroupeelem;

        return $this;
    }

    /**
     * Remove numgroupeelem
     *
     * @param \AppBundle\Entity\GroupeElem $numgroupeelem
     */
    public function removeNumgroupeelem(\AppBundle\Entity\GroupeElem $numgroupeelem)
    {
        $this->numgroupeelem->removeElement($numgroupeelem);
    }

    /**
     * Get numgroupeelem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumgroupeelem()
    {
        return "".$this->numgroupeelem;
    }
}
