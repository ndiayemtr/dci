<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relever
 *
 * @ORM\Table(name="relever")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\ReleverRepository")
 */
class Relever
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
     * @ORM\Column(name="typeCondionnement", type="datetime")
     */
    private $dateDuRelever;
    
    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string", length=255)
     */
    private $quantite;
    
    /**
     * @ORM\OneToOne(targetEntity="DCI\DciBundle\Entity\Indicateur", cascade={"persist", "remove"})
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
     * Set dateDuRelever
     *
     * @param \DateTime $dateDuRelever
     *
     * @return Relever
     */
    public function setDateDuRelever($dateDuRelever)
    {
        $this->dateDuRelever = $dateDuRelever;

        return $this;
    }

    /**
     * Get dateDuRelever
     *
     * @return \DateTime
     */
    public function getDateDuRelever()
    {
        return $this->dateDuRelever;
    }

    /**
     * Set quantite
     *
     * @param string $quantite
     *
     * @return Relever
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return string
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set indicateur
     *
     * @param \DCI\DciBundle\Entity\Indicateur $indicateur
     *
     * @return Relever
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
