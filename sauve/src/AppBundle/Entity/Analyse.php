<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Analyse
 *
 * @ORM\Table(name="analyse", indexes={@ORM\Index(name="i_fk_analyse_unite", columns={"numunit"})})
 * @ORM\Entity
 */
class Analyse
{
    /**
     * @var integer
     *
     * @ORM\Column(name="numanal", type="bigint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numanal;

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
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\GroupeAnal", mappedBy="numanal")
     */
    private $groupeAnal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PersAnalCal", mappedBy="numanal")
     */
    private $persAnalCal;

    /**
     * @var \AppBundle\Entity\Unite
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Unite")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="numunit", referencedColumnName="numunit")
     * })
     */
    private $numunit;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\CategAnal", inversedBy="numanal")
     * @ORM\JoinTable(name="anal_categanal",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numanal", referencedColumnName="numanal")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numcateganal", referencedColumnName="numcateganal")
     *   }
     * )
     */
    private $numcateganal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\ReferenceAnal", inversedBy="numanal")
     * @ORM\JoinTable(name="anal_refanal",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numanal", referencedColumnName="numanal")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numrefanal", referencedColumnName="numrefanal")
     *   }
     * )
     */
    private $numrefanal;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Reactif", mappedBy="numanal")
     */
    private $numreact;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groupeAnal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->persAnalCal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numcateganal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numrefanal = new \Doctrine\Common\Collections\ArrayCollection();
        $this->numreact = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomanal
     *
     * @param string $nomanal
     *
     * @return Analyse
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
     * @return Analyse
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
     * Get numanal
     *
     * @return integer
     */
    public function getNumanal()
    {
        return $this->numanal;
    }

    /**
     * Add groupeAnal
     *
     * @param \AppBundle\Entity\GroupeAnal $groupeAnal
     *
     * @return Analyse
     */
    public function addGroupeAnal(\AppBundle\Entity\GroupeAnal $groupeAnal)
    {
        $this->groupeAnal[] = $groupeAnal;

        return $this;
    }

    /**
     * Remove groupeAnal
     *
     * @param \AppBundle\Entity\GroupeAnal $groupeAnal
     */
    public function removeGroupeAnal(\AppBundle\Entity\GroupeAnal $groupeAnal)
    {
        $this->groupeAnal->removeElement($groupeAnal);
    }

    /**
     * Get groupeAnal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupeAnal()
    {
        return $this->groupeAnal;
    }

    /**
     * Add persAnalCal
     *
     * @param \AppBundle\Entity\PersAnalCal $persAnalCal
     *
     * @return Analyse
     */
    public function addPersAnalCal(\AppBundle\Entity\PersAnalCal $persAnalCal)
    {
        $this->persAnalCal[] = $persAnalCal;

        return $this;
    }

    /**
     * Remove persAnalCal
     *
     * @param \AppBundle\Entity\PersAnalCal $persAnalCal
     */
    public function removePersAnalCal(\AppBundle\Entity\PersAnalCal $persAnalCal)
    {
        $this->persAnalCal->removeElement($persAnalCal);
    }

    /**
     * Get persAnalCal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersAnalCal()
    {
        return $this->persAnalCal;
    }

    /**
     * Set numunit
     *
     * @param \AppBundle\Entity\Unite $numunit
     *
     * @return Analyse
     */
    public function setNumunit(\AppBundle\Entity\Unite $numunit = null)
    {
        $this->numunit = $numunit;

        return $this;
    }

    /**
     * Get numunit
     *
     * @return \AppBundle\Entity\Unite
     */
    public function getNumunit()
    {
        return $this->numunit;
    }

    /**
     * Add numcateganal
     *
     * @param \AppBundle\Entity\CategAnal $numcateganal
     *
     * @return Analyse
     */
    public function addNumcateganal(\AppBundle\Entity\CategAnal $numcateganal)
    {
        $this->numcateganal[] = $numcateganal;

        return $this;
    }

    /**
     * Remove numcateganal
     *
     * @param \AppBundle\Entity\CategAnal $numcateganal
     */
    public function removeNumcateganal(\AppBundle\Entity\CategAnal $numcateganal)
    {
        $this->numcateganal->removeElement($numcateganal);
    }

    /**
     * Get numcateganal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumcateganal()
    {
        return $this->numcateganal;
    }

    /**
     * Add numrefanal
     *
     * @param \AppBundle\Entity\ReferenceAnal $numrefanal
     *
     * @return Analyse
     */
    public function addNumrefanal(\AppBundle\Entity\ReferenceAnal $numrefanal)
    {
        $this->numrefanal[] = $numrefanal;

        return $this;
    }

    /**
     * Remove numrefanal
     *
     * @param \AppBundle\Entity\ReferenceAnal $numrefanal
     */
    public function removeNumrefanal(\AppBundle\Entity\ReferenceAnal $numrefanal)
    {
        $this->numrefanal->removeElement($numrefanal);
    }

    /**
     * Get numrefanal
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumrefanal()
    {
        return $this->numrefanal;
    }

    /**
     * Add numreact
     *
     * @param \AppBundle\Entity\Reactif $numreact
     *
     * @return Analyse
     */
    public function addNumreact(\AppBundle\Entity\Reactif $numreact)
    {
        $this->numreact[] = $numreact;

        return $this;
    }

    /**
     * Remove numreact
     *
     * @param \AppBundle\Entity\Reactif $numreact
     */
    public function removeNumreact(\AppBundle\Entity\Reactif $numreact)
    {
        $this->numreact->removeElement($numreact);
    }

    /**
     * Get numreact
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumreact()
    {
        return $this->numreact;
    }
    
    public function __toString() {
        return $this->getNomanal();
    }
}
