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
     * @ORM\Column(name="dateDuRelever", type="string", length=255)
     */
    private $dateDuRelever;
    
    /**
     * @var string
     *
     * @ORM\Column(name="quantite", type="string", length=255)
     */
    private $quantite;
    
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\IndicaProdSer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $indicaProdSer;


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
     * Set indicaProdSer
     *
     * @param \DCI\DciBundle\Entity\IndicaProdSer $indicaProdSer
     *
     * @return Relever
     */
    public function setIndicaProdSer(\DCI\DciBundle\Entity\IndicaProdSer $indicaProdSer)
    {
        $this->indicaProdSer = $indicaProdSer;

        return $this;
    }

    /**
     * Get indicaProdSer
     *
     * @return \DCI\DciBundle\Entity\IndicaProdSer
     */
    public function getIndicaProdSer()
    {
        return $this->indicaProdSer;
    }
}
