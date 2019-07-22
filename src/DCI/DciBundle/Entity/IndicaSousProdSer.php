<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * IndicaSousProdSer
 *
 * @ORM\Table(name="indica_sous_prod_ser")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\IndicaSousProdSerRepository")
 */
class IndicaSousProdSer
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
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\SousCategorieEntite")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sousCateEntite;   
    
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
     * Set sousCateEntite
     *
     * @param \DCI\DciBundle\Entity\SousCategorieEntite $sousCateEntite
     *
     * @return IndicaSousProdSer
     */
    public function setSousCateEntite(\DCI\DciBundle\Entity\SousCategorieEntite $sousCateEntite)
    {
        $this->sousCateEntite = $sousCateEntite;

        return $this;
    }

    /**
     * Get sousCateEntite
     *
     * @return \DCI\DciBundle\Entity\SousCategorieEntite
     */
    public function getSousCateEntite()
    {
        return $this->sousCateEntite;
    }

    /**
     * Set indicateur
     *
     * @param \DCI\DciBundle\Entity\Indicateur $indicateur
     *
     * @return IndicaSousProdSer
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
