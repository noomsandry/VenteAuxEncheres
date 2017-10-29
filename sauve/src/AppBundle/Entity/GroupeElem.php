<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GroupeElem
 *
 * @ORM\Table(name="groupe_elem")
 * @ORM\Entity
 */
class GroupeElem
{
    /**
     * @var string
     *
     * @ORM\Column(name="nomgroupeelem", type="string", length=32, nullable=false)
     */
    private $nomgroupeelem;

    /**
     * @var integer
     *
     * @ORM\Column(name="numgroupeelem", type="smallint")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $numgroupeelem;

    /**
     * @var \Doctrine\Common\Collections\Collection
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Element", inversedBy="numgroupeelem")
     * @ORM\JoinTable(name="elem_groupelem",
     *   joinColumns={
     *     @ORM\JoinColumn(name="numgroupeelem", referencedColumnName="numgroupeelem")
     *   },
     *   inverseJoinColumns={
     *     @ORM\JoinColumn(name="numelem", referencedColumnName="numelem")
     *   }
     * )
     */
    private $numelem;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->numelem = new \Doctrine\Common\Collections\ArrayCollection();
    }


    /**
     * Set nomgroupeelem
     *
     * @param string $nomgroupeelem
     *
     * @return GroupeElem
     */
    public function setNomgroupeelem($nomgroupeelem)
    {
        $this->nomgroupeelem = $nomgroupeelem;

        return $this;
    }

    /**
     * Get nomgroupeelem
     *
     * @return string
     */
    public function getNomgroupeelem()
    {
        return $this->nomgroupeelem;
    }

    /**
     * Get numgroupeelem
     *
     * @return integer
     */
    public function getNumgroupeelem()
    {
        return $this->numgroupeelem;
    }

    /**
     * Add numelem
     *
     * @param \AppBundle\Entity\Element $numelem
     *
     * @return GroupeElem
     */
    public function addNumelem(\AppBundle\Entity\Element $numelem)
    {
        $this->numelem[] = $numelem;

        return $this;
    }

    /**
     * Remove numelem
     *
     * @param \AppBundle\Entity\Element $numelem
     */
    public function removeNumelem(\AppBundle\Entity\Element $numelem)
    {
        $this->numelem->removeElement($numelem);
    }

    /**
     * Get numelem
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getNumelem()
    {
        return "".$this->numelem;
    }
}
