<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AttributEntite
 *
 * @ORM\Table(name="attribut_entite")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\AttributEntiteRepository")
 */
class AttributEntite
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
     * @ORM\Column(name="addAttributEntite", type="string", length=255)
     */
    private $addAttributEntite;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Entite", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $entite; 
    
    


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
     * @return AttributEntite
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
     * Set addAttributEntite
     *
     * @param string $addAttributEntite
     *
     * @return AttributEntite
     */
    public function setAddAttributEntite($addAttributEntite)
    {
        $this->addAttributEntite = $addAttributEntite;

        return $this;
    }

    /**
     * Get addAttributEntite
     *
     * @return string
     */
    public function getAddAttributEntite()
    {
        return $this->addAttributEntite;
    }

    /**
     * Set entite
     *
     * @param \DCI\DciBundle\Entity\Entite $entite
     *
     * @return AttributEntite
     */
    public function setEntite(\DCI\DciBundle\Entity\Entite $entite)
    {
        $this->entite = $entite;

        return $this;
    }

    /**
     * Get entite
     *
     * @return \DCI\DciBundle\Entity\Entite
     */
    public function getEntite()
    {
        return $this->entite;
    }
}
