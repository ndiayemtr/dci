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
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=50)
     */
    private $code;
           
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
     * @return SousCategorieEntite
     */
    public function setNomEntite($nomEntite)
    {
        $this->nomEntite = $nomEntite;

        return $this;
    }
    
    /**
     * Set nomEntite
     *
     * @param string $code
     *
     * @return SousCategorieEntite
     */
    public function setCode($code)
    {
        $this->code = $code;

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
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
