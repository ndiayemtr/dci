<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttributMarchandise
 *
 * @ORM\Table(name="attribut_marchandise")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\AttributMarchandiseRepository")
 */
class AttributMarchandise
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="addAttributMarch", type="string", length=255)
     */
    private $addAttributMarch;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Marchandise", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $marchandise;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return AttributMarchandise
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * Set addAttributMarch
     *
     * @param string $addAttributMarch
     *
     * @return AttributMarchandise
     */
    public function setAddAttributMarch($addAttributMarch)
    {
        $this->addAttributMarch = $addAttributMarch;

        return $this;
    }

    /**
     * Get addAttributMarch
     *
     * @return string
     */
    public function getAddAttributMarch()
    {
        return $this->addAttributMarch;
    }

    /**
     * Set marchandise
     *
     * @param \DCI\DciBundle\Entity\Marchandise $marchandise
     *
     * @return AttributMarchandise
     */
    public function setMarchandise(\DCI\DciBundle\Entity\Marchandise $marchandise)
    {
        $this->marchandise = $marchandise;

        return $this;
    }

    /**
     * Get marchandise
     *
     * @return \DCI\DciBundle\Entity\Marchandise
     */
    public function getMarchandise()
    {
        return $this->marchandise;
    }
}
