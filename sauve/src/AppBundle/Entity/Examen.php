<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Examen
 *
 * @ORM\Table(name="examen")
 * @ORM\Entity
 */
class Examen
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomexam", type="string", length=32, nullable=false)
     */
    private $nomexam;

    /**
     * @var integer
     *
     * @ORM\Column(name="numexam", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numexam;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Element", mappedBy="numexam")
     */
    private $element;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GroupeAnal", mappedBy="numexam")
     */
    private $numgroupeanal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\TypeExam", mappedBy="numexam")
     */
    private $numtypeexam;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->element = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numgroupeanal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numtypeexam = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomexam
     *
     * @param string $nomexam
     *
     * @return Examen
     */
    public function setNomexam($nomexam)
    {
        $this->nomexam = $nomexam;

        return $this;
    }

    /**
     * Get nomexam
     *
     * @return string
     */
    public function getNomexam()
    {
        return $this->nomexam;
    }

    /**
     * Get numexam
     *
     * @return integer
     */
    public function getNumexam()
    {
        return $this->numexam;
    }

    /**
     * Add element
     *
     * @param \AppBundle\Entity\Element $element
     *
     * @return Examen
     */
    public function addElement(\AppBundle\Entity\Element $element)
    {
        $this->element[] = $element;

        return $this;
    }

    /**
     * Remove element
     *
     * @param \AppBundle\Entity\Element $element
     */
    public function removeElement(\AppBundle\Entity\Element $element)
    {
        $this->element->removeElement($element);
    }

    /**
     * Get element
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getElement()
    {
        return $this->element;
    }

    /**
     * Add numgroupeanal
     *
     * @param \AppBundle\Entity\GroupeAnal $numgroupeanal
     *
     * @return Examen
     */
    public function addNumgroupeanal(\AppBundle\Entity\GroupeAnal $numgroupeanal)
    {
        $this->numgroupeanal[] = $numgroupeanal;

        return $this;
    }

    /**
     * Remove numgroupeanal
     *
     * @param \AppBundle\Entity\GroupeAnal $numgroupeanal
     */
    public function removeNumgroupeanal(\AppBundle\Entity\GroupeAnal $numgroupeanal)
    {
        $this->numgroupeanal->removeElement($numgroupeanal);
    }

    /**
     * Get numgroupeanal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumgroupeanal()
    {
        return $this->numgroupeanal;
    }

    /**
     * Add numtypeexam
     *
     * @param \AppBundle\Entity\TypeExam $numtypeexam
     *
     * @return Examen
     */
    public function addNumtypeexam(\AppBundle\Entity\TypeExam $numtypeexam)
    {
        $this->numtypeexam[] = $numtypeexam;

        return $this;
    }

    /**
     * Remove numtypeexam
     *
     * @param \AppBundle\Entity\TypeExam $numtypeexam
     */
    public function removeNumtypeexam(\AppBundle\Entity\TypeExam $numtypeexam)
    {
        $this->numtypeexam->removeElement($numtypeexam);
    }

    /**
     * Get numtypeexam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumtypeexam()
    {
        return "".$this->numtypeexam;
    }
}
