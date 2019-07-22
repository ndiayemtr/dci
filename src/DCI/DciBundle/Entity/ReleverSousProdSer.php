<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ReleverSousProdSer
 *
 * @ORM\Table(name="relever_sous_prod_ser")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\ReleverSousProdSerRepository")
 */
class ReleverSousProdSer
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
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\IndicaSousProdSer", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $indicaSousProdSer;


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
     * @return ReleverSousProdSer
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
     * @return ReleverSousProdSer
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
     * Set indicaSousProdSer
     *
     * @param \DCI\DciBundle\Entity\IndicaSousProdSer $indicaSousProdSer
     *
     * @return ReleverSousProdSer
     */
    public function setIndicaSousProdSer(\DCI\DciBundle\Entity\IndicaSousProdSer $indicaSousProdSer)
    {
        $this->indicaSousProdSer = $indicaSousProdSer;

        return $this;
    }

    /**
     * Get indicaSousProdSer
     *
     * @return \DCI\DciBundle\Entity\IndicaSousProdSer
     */
    public function getIndicaSousProdSer()
    {
        return $this->indicaSousProdSer;
    }
}
