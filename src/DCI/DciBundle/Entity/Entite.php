<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Entite
 *
 * @ORM\Table(name="entite")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\EntiteRepository")
 */
class Entite
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;
    
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
    
    /**
     * @var string
     *
     * @ORM\Column(name="niveauClassement", type="integer")
     */
    private $niveauClassement;
    
    /**
     * @ORM\OneToOne(targetEntity="DCI\DciBundle\Entity\CategorieEntite", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieEntite; 
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Departement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement; 


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
     * Set code
     *
     * @param string $code
     *
     * @return Entite
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Entite
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
     * Set description
     *
     * @param string $description
     *
     * @return Entite
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set niveauClassement
     *
     * @param integer $niveauClassement
     *
     * @return Entite
     */
    public function setNiveauClassement($niveauClassement)
    {
        $this->niveauClassement = $niveauClassement;

        return $this;
    }

    /**
     * Get niveauClassement
     *
     * @return integer
     */
    public function getNiveauClassement()
    {
        return $this->niveauClassement;
    }

    /**
     * Set categorieEntite
     *
     * @param \DCI\DciBundle\Entity\CategorieEntite $categorieEntite
     *
     * @return Entite
     */
    public function setCategorieEntite(\DCI\DciBundle\Entity\CategorieEntite $categorieEntite)
    {
        $this->categorieEntite = $categorieEntite;

        return $this;
    }

    /**
     * Get categorieEntite
     *
     * @return \DCI\DciBundle\Entity\CategorieEntite
     */
    public function getCategorieEntite()
    {
        return $this->categorieEntite;
    }

    /**
     * Set departement
     *
     * @param \DCI\DciBundle\Entity\Departement $departement
     *
     * @return Entite
     */
    public function setDepartement(\DCI\DciBundle\Entity\Departement $departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \DCI\DciBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }
}
