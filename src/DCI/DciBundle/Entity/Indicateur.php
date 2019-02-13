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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255)
     */
    private $origine;

    /**
     * @var string
     *
     * @ORM\Column(name="producteur", type="string", length=255)
     */
    private $producteur;
    
    /**
     * @var string
     *
     * @ORM\Column(name="unite", type="string", length=255)
     */
    private $unite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="periodicite", type="string", length=255)
     */
    private $periodicite;

    /**
     * @var string
     *
     * @ORM\Column(name="typeCondionnement", type="string", length=255)
     */
    private $typeCondionnement;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Departement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;
    
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
     * Set origine
     *
     * @param string $origine
     *
     * @return Indicateur
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set producteur
     *
     * @param string $producteur
     *
     * @return Indicateur
     */
    public function setProducteur($producteur)
    {
        $this->producteur = $producteur;

        return $this;
    }

    /**
     * Get producteur
     *
     * @return string
     */
    public function getProducteur()
    {
        return $this->producteur;
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
     * Set typeCondionnement
     *
     * @param string $typeCondionnement
     *
     * @return Indicateur
     */
    public function setTypeCondionnement($typeCondionnement)
    {
        $this->typeCondionnement = $typeCondionnement;

        return $this;
    }

    /**
     * Get typeCondionnement
     *
     * @return string
     */
    public function getTypeCondionnement()
    {
        return $this->typeCondionnement;
    }

    /**
     * Set departement
     *
     * @param \DCI\DciBundle\Entity\Departement $departement
     *
     * @return Indicateur
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

    /**
     * Set marchandise
     *
     * @param \DCI\DciBundle\Entity\Marchandise $marchandise
     *
     * @return Indicateur
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
