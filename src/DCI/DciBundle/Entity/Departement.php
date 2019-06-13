<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Departement
 *
 * @ORM\Table(name="departement")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\DepartementRepository")
 */
class Departement
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
     * @ORM\Column(name="nomDepartement", type="string", length=255)
     */
    private $nomDepartement;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Region")
     * @ORM\JoinColumn(nullable=false)
     */
    private $region;


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
     * Set nomDepartement
     *
     * @param string $nomDepartement
     *
     * @return Departement
     */
    public function setNomDepartement($nomDepartement)
    {
        $this->nomDepartement = $nomDepartement;

        return $this;
    }

    /**
     * Get nomDepartement
     *
     * @return string
     */
    public function getNomDepartement()
    {
        return $this->nomDepartement;
    }

    /**
     * Set region
     *
     * @param \DCI\DciBundle\Entity\Region $region
     *
     * @return Departement
     */
    public function setRegion(\DCI\DciBundle\Entity\Region $region)
    {
        $this->region = $region;

        return $this;
    }

    /**
     * Get region
     *
     * @return \DCI\DciBundle\Entity\Region
     */
    public function getRegion()
    {
        return $this->region;
    }
    
     /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getNomDepartement();
      
    }
}
