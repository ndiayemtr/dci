<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Indicateur
 *
 * @ORM\Table(name="indicateur")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\IndicateurRepository")
 */
class Indicateur
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
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;
	
	/**
     * @var string
     *
     * @ORM\Column(name="typeIndicateur", type="string", columnDefinition="enum('Importations', 'Production', 'Exportations', 'Consommation')")
     */
    private $typeIndicateur;
	
    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", columnDefinition="enum('Accessibilité', 'Sécurité', 'Qualité', 'Environnement')")
     */
    private $categorie;
	
    /**
     * @var string
     *
     * @ORM\Column(name="sousCategorie", type="string", length=255)
     */
    private $sousCategorie;
    
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;

    /**
     * @var string
     *
     * @ORM\Column(name="typeData", type="string", length=255)
     */
    private $typeData;
    
    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255)
     */
    private $unite;

    /**
     * @var string
     *
     * @ORM\Column(name="mode", type="string", length=255)
     */
    private $mode;
    
    /**
     * @var string
     *
     * @ORM\Column(name="niveau", type="string", columnDefinition="enum('Departemental', 'Regionale', 'Nationnal')")
     */
    private $niveau;     

    /**
     * @var string
     *
     * @ORM\Column(name="periodicite", type="string", length=255)
     */
    private $periodicite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="dateIndi", type="string", length=255)
     */
    private $dateIndi;
    

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
     * Set reference
     *
     * @param string $reference
     *
     * @return Indicateur
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Indicateur
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
     * Set typeData
     *
     * @param string $typeData
     *
     * @return Indicateur
     */
    public function setTypeData($typeData)
    {
        $this->typeData = $typeData;

        return $this;
    }

    /**
     * Get typeData
     *
     * @return string
     */
    public function getTypeData()
    {
        return $this->typeData;
    }

    /**
     * Set unite
     *
     * @param string $unite
     *
     * @return Indicateur
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Get unite
     *
     * @return string
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set mode
     *
     * @param string $mode
     *
     * @return Indicateur
     */
    public function setMode($mode)
    {
        $this->mode = $mode;

        return $this;
    }

    /**
     * Get mode
     *
     * @return string
     */
    public function getMode()
    {
        return $this->mode;
    }

    /**
     * Set niveau
     *
     * @param string $niveau
     *
     * @return Indicateur
     */
    public function setNiveau($niveau)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get niveau
     *
     * @return string
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    /**
     * Set periodicite
     *
     * @param string $periodicite
     *
     * @return Indicateur
     */
    public function setPeriodicite($periodicite)
    {
        $this->periodicite = $periodicite;

        return $this;
    }

    /**
     * Get periodicite
     *
     * @return string
     */
    public function getPeriodicite()
    {
        return $this->periodicite;
    }

    /**
     * Set dateIndi
     *
     * @param string $dateIndi
     *
     * @return Indicateur
     */
    public function setDateIndi($dateIndi)
    {
        $this->dateIndi = $dateIndi;

        return $this;
    }

    /**
     * Get dateIndi
     *
     * @return string
     */
    public function getDateIndi()
    {
        return $this->dateIndi;
    }
    
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getLibelle();
      
    }

    /**
     * Set typeIndicateur
     *
     * @param string $typeIndicateur
     *
     * @return Indicateur
     */
    public function setTypeIndicateur($typeIndicateur)
    {
        $this->typeIndicateur = $typeIndicateur;

        return $this;
    }

    /**
     * Get typeIndicateur
     *
     * @return string
     */
    public function getTypeIndicateur()
    {
        return $this->typeIndicateur;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Indicateur
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set sousCategorie
     *
     * @param string $sousCategorie
     *
     * @return Indicateur
     */
    public function setSousCategorie($sousCategorie)
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * Get sousCategorie
     *
     * @return string
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }
}
