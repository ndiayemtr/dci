<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicaProdSer
 *
 * @ORM\Table(name="indica_prod_ser")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\IndicaProdSerRepository")
 */
class IndicaProdSer
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
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\CategorieEntite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categorieEntite;   
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Indicateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $indicateur;


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
     * Set categorieEntite
     *
     * @param \DCI\DciBundle\Entity\CategorieEntite $categorieEntite
     *
     * @return IndicaProdSer
     */
    public function setCategorieEntite(\DCI\DciBundle\Entity\CategorieEntite $categorieEntite)
    {
        $this->categorieEntite = $categorieEntite;

        return $this;
    }

    /**
     * Get categorieEntite
     *
     * @return \DCI\DciBundle\Entity\CategorieEntite
     */
    public function getCategorieEntite()
    {
        return $this->categorieEntite;
    }

    /**
     * Set indicateur
     *
     * @param \DCI\DciBundle\Entity\Indicateur $indicateur
     *
     * @return IndicaProdSer
     */
    public function setIndicateur(\DCI\DciBundle\Entity\Indicateur $indicateur)
    {
        $this->indicateur = $indicateur;

        return $this;
    }

    /**
     * Get indicateur
     *
     * @return \DCI\DciBundle\Entity\Indicateur
     */
    public function getIndicateur()
    {
        return $this->indicateur;
    }
}
