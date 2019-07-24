<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Operateur
 *
 * @ORM\Table(name="operateur")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\OperateurRepository")
 */
class Operateur
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
     * @ORM\Column(name="typeOperateur", type="string", length=255)
     */
    private $typeOperateur;
        
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
     /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getLibelle();
      
    }


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
     * Set typeOperateur
     *
     * @param string $typeOperateur
     *
     * @return Operateur
     */
    public function setTypeOperateur($typeOperateur)
    {
        $this->typeOperateur = $typeOperateur;

        return $this;
    }

    /**
     * Get typeOperateur
     *
     * @return string
     */
    public function getTypeOperateur()
    {
        return $this->typeOperateur;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Operateur
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
}
