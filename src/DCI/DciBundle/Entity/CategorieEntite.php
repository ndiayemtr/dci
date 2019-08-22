<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CategorieEntite
 *
 * @ORM\Table(name="categorie_entite")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\CategorieEntiteRepository")
 */
class CategorieEntite
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
     * @ORM\Column(name="typeCat", type="string", columnDefinition="enum('Produit', 'Service')")
     */
    private $typeCat;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nomEntite", type="string", length=50)
     */
    private $nomEntite;
    
    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;
	
	/**
     * @var string
     *
     * @ORM\Column(name="code", type="string", length=50)
     */
    private $code;
	


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
     * Set nomEntite
     *
     * @param string $code
     *
     * @return CategorieEntite
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
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
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
     * Set description
     *
     * @param string $description
     *
     * @return CategorieEntite
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
}
