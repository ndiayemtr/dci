<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicaMarcha
 *
 * @ORM\Table(name="indica_marcha")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\IndicaMarchaRepository")
 */
class IndicaMarcha
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
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Marchandise")
     * @ORM\JoinColumn(nullable=false)
     */
    private $marchandise;   
    
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
     * Set marchandise
     *
     * @param \DCI\DciBundle\Entity\Marchandise $marchandise
     *
     * @return IndicaMarcha
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

    /**
     * Set indicateur
     *
     * @param \DCI\DciBundle\Entity\Indicateur $indicateur
     *
     * @return IndicaMarcha
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
