<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Consommateur
 *
 * @ORM\Table(name="consommateur")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\ConsommateurRepository")
 */
class Consommateur
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
     * @ORM\Column(name="typeConsommateur", type="string", length=255)
     */
    private $typeConsommateur;
        
    /**
     * @var string
     *
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
     /**
     * @var string
     *
     * @ORM\Column(name="quantiteUtiliser", type="string", length=255)
     */
    private $quantiteUtiliser;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Marchandise")
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
     * Set typeConsommateur
     *
     * @param string $typeConsommateur
     *
     * @return Consommateur
     */
    public function setTypeConsommateur($typeConsommateur)
    {
        $this->typeConsommateur = $typeConsommateur;

        return $this;
    }

    /**
     * Get typeConsommateur
     *
     * @return string
     */
    public function getTypeConsommateur()
    {
        return $this->typeConsommateur;
    }

    /**
     * Set libelle
     *
     * @param string $libelle
     *
     * @return Consommateur
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
     * Set quantiteUtiliser
     *
     * @param string $quantiteUtiliser
     *
     * @return Consommateur
     */
    public function setQuantiteUtiliser($quantiteUtiliser)
    {
        $this->quantiteUtiliser = $quantiteUtiliser;

        return $this;
    }

    /**
     * Get quantiteUtiliser
     *
     * @return string
     */
    public function getQuantiteUtiliser()
    {
        return $this->quantiteUtiliser;
    }

    /**
     * Set marchandise
     *
     * @param \DCI\DciBundle\Entity\Marchandise $marchandise
     *
     * @return Consommateur
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
