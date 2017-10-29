<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupeAnal
 *
 * @ORM\Table(name="groupe_anal", indexes={@ORM\Index(name="i_fk_groupe_anal_analyse", columns={"numanal"})})
 * @ORM\Entity
 */
class GroupeAnal
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomgroupeanal", type="string", length=32, nullable=false)
     */
    private $nomgroupeanal;

    /**
     * @var string
     *
     * @ORM\Column(name="nomanal", type="string", length=32, nullable=false)
     */
    private $nomanal;

    /**
     * @var integer
     *
     * @ORM\Column(name="prixanal", type="bigint", nullable=false)
     */
    private $prixanal;

    /**
     * @var integer
     *
     * @ORM\Column(name="numgroupeanal", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numgroupeanal;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Examen", inversedBy="numgroupeanal")
     * @ORM\JoinTable(name="exam_groupanal",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numgroupeanal", referencedColumnName="numgroupeanal")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numexam", referencedColumnName="numexam")
     *   }
     * )
     */
    private $numexam;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Prelevement", inversedBy="numgroupeanal")
     * @ORM\JoinTable(name="prelev_groupanal",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numgroupeanal", referencedColumnName="numgroupeanal")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numprelev", referencedColumnName="numprelev")
     *   }
     * )
     */
    private $numprelev;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numexam = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numprelev = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomgroupeanal
     *
     * @param string $nomgroupeanal
     *
     * @return GroupeAnal
     */
    public function setNomgroupeanal($nomgroupeanal)
    {
        $this->nomgroupeanal = $nomgroupeanal;

        return $this;
    }

    /**
     * Get nomgroupeanal
     *
     * @return string
     */
    public function getNomgroupeanal()
    {
        return $this->nomgroupeanal;
    }

    /**
     * Set nomanal
     *
     * @param string $nomanal
     *
     * @return GroupeAnal
     */
    public function setNomanal($nomanal)
    {
        $this->nomanal = $nomanal;

        return $this;
    }

    /**
     * Get nomanal
     *
     * @return string
     */
    public function getNomanal()
    {
        return $this->nomanal;
    }

    /**
     * Set prixanal
     *
     * @param integer $prixanal
     *
     * @return GroupeAnal
     */
    public function setPrixanal($prixanal)
    {
        $this->prixanal = $prixanal;

        return $this;
    }

    /**
     * Get prixanal
     *
     * @return integer
     */
    public function getPrixanal()
    {
        return $this->prixanal;
    }

    /**
     * Get numgroupeanal
     *
     * @return integer
     */
    public function getNumgroupeanal()
    {
        return $this->numgroupeanal;
    }

    /**
     * Set numanal
     *
     * @param \AppBundle\Entity\Analyse $numanal
     *
     * @return GroupeAnal
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
        return $this->numanal;
    }

    /**
     * Add numexam
     *
     * @param \AppBundle\Entity\Examen $numexam
     *
     * @return GroupeAnal
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

    /**
     * Add numprelev
     *
     * @param \AppBundle\Entity\Prelevement $numprelev
     *
     * @return GroupeAnal
     */
    public function addNumprelev(\AppBundle\Entity\Prelevement $numprelev)
    {
        $this->numprelev[] = $numprelev;

        return $this;
    }

    /**
     * Remove numprelev
     *
     * @param \AppBundle\Entity\Prelevement $numprelev
     */
    public function removeNumprelev(\AppBundle\Entity\Prelevement $numprelev)
    {
        $this->numprelev->removeElement($numprelev);
    }

    /**
     * Get numprelev
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumprelev()
    {
        return "".$this->numprelev;
    }
}
