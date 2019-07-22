<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReleverMarchandise
 *
 * @ORM\Table(name="relever_marchandise")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\ReleverMarchandiseRepository")
 */
class ReleverMarchandise
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
     * @ORM\Column(name="quantite", type="string", length=255)
     */
    private $quantite;

    /**
     * @var string
     *
     * @ORM\Column(name="dateDuRelever", type="string", length=255)
     */
    private $dateDuRelever;    
        
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\IndicaMarcha")
     * @ORM\JoinColumn(nullable=false)
     */
    private $indicaMarcha;


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
     * Set quantite
     *
     * @param string $quantite
     *
     * @return ReleverMarchandise
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
     * Set dateDuRelever
     *
     * @param \DateTime $dateDuRelever
     *
     * @return ReleverMarchandise
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
     * Set indicaMarcha
     *
     * @param \DCI\DciBundle\Entity\IndicaMarcha $indicaMarcha
     *
     * @return ReleverMarchandise
     */
    public function setIndicaMarcha(\DCI\DciBundle\Entity\IndicaMarcha $indicaMarcha)
    {
        $this->indicaMarcha = $indicaMarcha;

        return $this;
    }

    /**
     * Get indicaMarcha
     *
     * @return \DCI\DciBundle\Entity\IndicaMarcha
     */
    public function getIndicaMarcha()
    {
        return $this->indicaMarcha;
    }
}
