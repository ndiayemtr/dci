<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * OperatSousCateg
 *
 * @ORM\Table(name="operat_sous_categ")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\OperatSousCategRepository")
 */
class OperatSousCateg
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
    private $sousCategEntite;
        
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Operateur")
     * @ORM\JoinColumn(nullable=false)
     */
    private $operateur;
    
       /**
     * @var string
     *
     * @ORM\Column(name="quantiteDispo", type="string", length=255)
     */
    private $quantiteDispo;
        
    /**
     * @var string
     *
     * @ORM\Column(name="dateLanceProduit", type="string", length=255)
     */
    private $dateLanceProduit;
           
    /**
     * @var string
     *
     * @ORM\Column(name="dateExpireProduit", type="string", length=255)
     */
    private $dateExpireProduit;


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
     * Set sousCategEntite
     *
     * @param \DCI\DciBundle\Entity\SousCategorieEntite $sousCategEntite
     *
     * @return OperatSousCateg
     */
    public function setSousCategEntite(\DCI\DciBundle\Entity\SousCategorieEntite $sousCategEntite)
    {
        $this->sousCategEntite = $sousCategEntite;

        return $this;
    }

    /**
     * Get sousCategEntite
     *
     * @return \DCI\DciBundle\Entity\SousCategorieEntite
     */
    public function getSousCategEntite()
    {
        return $this->sousCategEntite;
    }

    /**
     * Set operateur
     *
     * @param \DCI\DciBundle\Entity\Operateur $operateur
     *
     * @return OperatSousCateg
     */
    public function setOperateur(\DCI\DciBundle\Entity\Operateur $operateur)
    {
        $this->operateur = $operateur;

        return $this;
    }

    /**
     * Get operateur
     *
     * @return \DCI\DciBundle\Entity\Operateur
     */
    public function getOperateur()
    {
        return $this->operateur;
    }

    /**
     * Set quantiteDispo
     *
     * @param string $quantiteDispo
     *
     * @return OperatSousCateg
     */
    public function setQuantiteDispo($quantiteDispo)
    {
        $this->quantiteDispo = $quantiteDispo;

        return $this;
    }

    /**
     * Get quantiteDispo
     *
     * @return string
     */
    public function getQuantiteDispo()
    {
        return $this->quantiteDispo;
    }

    /**
     * Set dateLanceProduit
     *
     * @param string $dateLanceProduit
     *
     * @return OperatSousCateg
     */
    public function setDateLanceProduit($dateLanceProduit)
    {
        $this->dateLanceProduit = $dateLanceProduit;

        return $this;
    }

    /**
     * Get dateLanceProduit
     *
     * @return string
     */
    public function getDateLanceProduit()
    {
        return $this->dateLanceProduit;
    }

    /**
     * Set dateExpireProduit
     *
     * @param string $dateExpireProduit
     *
     * @return OperatSousCateg
     */
    public function setDateExpireProduit($dateExpireProduit)
    {
        $this->dateExpireProduit = $dateExpireProduit;

        return $this;
    }

    /**
     * Get dateExpireProduit
     *
     * @return string
     */
    public function getDateExpireProduit()
    {
        return $this->dateExpireProduit;
    }
}
