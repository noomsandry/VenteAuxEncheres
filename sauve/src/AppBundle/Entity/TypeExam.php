<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeExam
 *
 * @ORM\Table(name="type_exam")
 * @ORM\Entity
 */
class TypeExam
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomtypeexam", type="string", length=32, nullable=false)
     */
    private $nomtypeexam;

    /**
     * @var integer
     *
     * @ORM\Column(name="numtypeexam", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numtypeexam;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Examen", inversedBy="numtypeexam")
     * @ORM\JoinTable(name="exam_typexam",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numtypeexam", referencedColumnName="numtypeexam")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numexam", referencedColumnName="numexam")
     *   }
     * )
     */
    private $numexam;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numexam = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomtypeexam
     *
     * @param string $nomtypeexam
     *
     * @return TypeExam
     */
    public function setNomtypeexam($nomtypeexam)
    {
        $this->nomtypeexam = $nomtypeexam;

        return $this;
    }

    /**
     * Get nomtypeexam
     *
     * @return string
     */
    public function getNomtypeexam()
    {
        return $this->nomtypeexam;
    }

    /**
     * Get numtypeexam
     *
     * @return integer
     */
    public function getNumtypeexam()
    {
        return $this->numtypeexam;
    }

    /**
     * Add numexam
     *
     * @param \AppBundle\Entity\Examen $numexam
     *
     * @return TypeExam
     */
    public function addNumexam(\AppBundle\Entity\Examen $numexam)
    {
        $this->numexam[] = $numexam;

        return $this;
    }

    /**
     * Remove numexam
     *
     * @param \AppBundle\Entity\Examen $numexam
     */
    public function removeNumexam(\AppBundle\Entity\Examen $numexam)
    {
        $this->numexam->removeElement($numexam);
    }

    /**
     * Get numexam
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumexam()
    {
        return $this->numexam;
    }
    
    public function __toString() {
        return $this->getNomtypeexam();
    }
}
