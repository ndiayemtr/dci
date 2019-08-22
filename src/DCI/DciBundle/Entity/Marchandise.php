<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marchandise
 *
 * @ORM\Table(name="marchandise")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\MarchandiseRepository")
 */
class Marchandise
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
     * @ORM\Column(name="stade", type="string", columnDefinition="enum('Manufacturé', 'Intermédiaire', 'Brut')")
     */
    private $stade;

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
     * @ORM\Column(name="dateMarchandise", type="string", length=255)
     */
    private $dateMarchandise;
    
    /**
     * @var string
     *
     * @ORM\Column(name="typeMarchandise", type="string", length=255)
     */
    private $typeMarchandise;
    
   
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\SousCategorieEntite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousCategorieEntite;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Departement")
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
    
    public function __toString(){
    
        return $this->getLibelle();
      
    }


    /**
     * Set reference
     *
     * @param string $reference
     *
     * @return Marchandise
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
     * Set stade
     *
     * @param string $stade
     *
     * @return Marchandise
     */
    public function setStade($stade)
    {
        $this->stade = $stade;

        return $this;
    }

    /**
     * Get stade
     *
     * @return string
     */
    public function getStade()
    {
        return $this->stade;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Marchandise
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
     * @return Marchandise
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
     * Set dateMarchandise
     *
     * @param string $dateMarchandise
     *
     * @return Marchandise
     */
    public function setDateMarchandise($dateMarchandise)
    {
        $this->dateMarchandise = $dateMarchandise;

        return $this;
    }

    /**
     * Get dateMarchandise
     *
     * @return string
     */
    public function getDateMarchandise()
    {
        return $this->dateMarchandise;
    }

    /**
     * Set typeMarchandise
     *
     * @param string $typeMarchandise
     *
     * @return Marchandise
     */
    public function setTypeMarchandise($typeMarchandise)
    {
        $this->typeMarchandise = $typeMarchandise;

        return $this;
    }

    /**
     * Get typeMarchandise
     *
     * @return string
     */
    public function getTypeMarchandise()
    {
        return $this->typeMarchandise;
    }

    /**
     * Set sousCategorieEntite
     *
     * @param \DCI\DciBundle\Entity\SousCategorieEntite $sousCategorieEntite
     *
     * @return Marchandise
     */
    public function setSousCategorieEntite(\DCI\DciBundle\Entity\SousCategorieEntite $sousCategorieEntite)
    {
        $this->sousCategorieEntite = $sousCategorieEntite;

        return $this;
    }

    /**
     * Get sousCategorieEntite
     *
     * @return \DCI\DciBundle\Entity\SousCategorieEntite
     */
    public function getSousCategorieEntite()
    {
        return $this->sousCategorieEntite;
    }

    /**
     * Set departement
     *
     * @param \DCI\DciBundle\Entity\Departement $departement
     *
     * @return Marchandise
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
