<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * SousCategorieEntite
 *
 * @ORM\Table(name="sous_categorie_entite")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\SousCategorieEntiteRepository")
 */
class SousCategorieEntite
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
     * @ORM\Column(name="nomEntite", type="string", length=50)
     */
    private $nomEntite;
           
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\CategorieEntite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousCategorieEntite;


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
     * Set nomEntite
     *
     * @param string $nomEntite
     *
     * @return CategorieEntite
     */
    public function setNomEntite($nomEntite)
    {
        $this->nomEntite = $nomEntite;

        return $this;
    }

    /**
     * Get nomEntite
     *
     * @return string
     */
    public function getNomEntite()
    {
        return $this->nomEntite;
    }
    
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getNomEntite();
      
    }


    /**
     * Set typeCat
     *
     * @param string $typeCat
     *
     * @return CategorieEntite
     */
    public function setTypeCat($typeCat)
    {
        $this->typeCat = $typeCat;

        return $this;
    }

    /**
     * Get typeCat
     *
     * @return string
     */
    public function getTypeCat()
    {
        return $this->typeCat;
    }

    /**
     * Set sousCategorieEntite
     *
     * @param \DCI\DciBundle\Entity\CategorieEntite $sousCategorieEntite
     *
     * @return SousCategorieEntite
     */
    public function setSousCategorieEntite(\DCI\DciBundle\Entity\CategorieEntite $sousCategorieEntite)
    {
        $this->sousCategorieEntite = $sousCategorieEntite;

        return $this;
    }

    /**
     * Get sousCategorieEntite
     *
     * @return \DCI\DciBundle\Entity\CategorieEntite
     */
    public function getSousCategorieEntite()
    {
        return $this->sousCategorieEntite;
    }
}
