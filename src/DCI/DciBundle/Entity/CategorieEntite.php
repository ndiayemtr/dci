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
     * @ORM\Column(name="nomEntite", type="string", length=50)
     */
    private $nomEntite;


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
}
