<?php

namespace DCI\DciBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Marchandise
 *
 * @ORM\Table(name="marchandise")
 * @ORM\Entity(repositoryClass="DCI\DciBundle\Repository\MarchandiseRepository")
 */
class Marchandise
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
     * @ORM\Column(name="reference", type="string", length=255)
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="stade", type="string", columnDefinition="enum('Manufacturé', 'Intermédiaire', 'Brut')")
     */
    private $stade;

    /**
     * @var string
     *
     * @ORM\Column(name="categorie", type="string", length=255)
     */
    private $categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="sousCategorie", type="string", length=255)
     */
    private $sousCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="origine", type="string", length=255)
     */
    
    /**
     * @var string
     *
     * @ORM\Column(name="natuteDuMarcha", type="string", length=255)
     */
    private $natuteDuMarcha;
    
    /**
     * @var string
     *
     * @ORM\Column(name="nonMarchandise", type="string", length=255)
     */
    private $nonMarchandise;
    
    /**
     * @var string
     *
     * @ORM\Column(name="typeMarchandise", type="string", length=255)
     */
    private $typeMarchandise;
   
    /**
     * @ORM\ManyToOne(targetEntity="DCI\DciBundle\Entity\Entite", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $entite;


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
     * Set reference
     *
     * @param string $reference
     *
     * @return Marchandise
     */
    public function setReference($reference)
    {
        $this->reference = $reference;

        return $this;
    }

    /**
     * Get reference
     *
     * @return string
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * Set stade
     *
     * @param string $stade
     *
     * @return Marchandise
     */
    public function setStade($stade)
    {
        $this->stade = $stade;

        return $this;
    }

    /**
     * Get stade
     *
     * @return string
     */
    public function getStade()
    {
        return $this->stade;
    }

    /**
     * Set categorie
     *
     * @param string $categorie
     *
     * @return Marchandise
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return string
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Set sousCategorie
     *
     * @param string $sousCategorie
     *
     * @return Marchandise
     */
    public function setSousCategorie($sousCategorie)
    {
        $this->sousCategorie = $sousCategorie;

        return $this;
    }

    /**
     * Get sousCategorie
     *
     * @return string
     */
    public function getSousCategorie()
    {
        return $this->sousCategorie;
    }

    /**
     * Set origine
     *
     * @param string $origine
     *
     * @return Marchandise
     */
    public function setOrigine($origine)
    {
        $this->origine = $origine;

        return $this;
    }

    /**
     * Get origine
     *
     * @return string
     */
    public function getOrigine()
    {
        return $this->origine;
    }

    /**
     * Set producteur
     *
     * @param string $producteur
     *
     * @return Marchandise
     */
    public function setProducteur($producteur)
    {
        $this->producteur = $producteur;

        return $this;
    }

    /**
     * Get producteur
     *
     * @return string
     */
    public function getProducteur()
    {
        return $this->producteur;
    }

    /**
     * Set typeCondionnement
     *
     * @param string $typeCondionnement
     *
     * @return Marchandise
     */
    public function setTypeCondionnement($typeCondionnement)
    {
        $this->typeCondionnement = $typeCondionnement;

        return $this;
    }

    /**
     * Get typeCondionnement
     *
     * @return string
     */
    public function getTypeCondionnement()
    {
        return $this->typeCondionnement;
    }

    /**
     * Set unite
     *
     * @param string $unite
     *
     * @return Marchandise
     */
    public function setUnite($unite)
    {
        $this->unite = $unite;

        return $this;
    }

    /**
     * Get unite
     *
     * @return string
     */
    public function getUnite()
    {
        return $this->unite;
    }

    /**
     * Set quantite
     *
     * @param string $quantite
     *
     * @return Marchandise
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
     * Set produitService
     *
     * @param \DCI\DciBundle\Entity\ProduitService $produitService
     *
     * @return Marchandise
     
    public function setProduitService(\DCI\DciBundle\Entity\ProduitService $produitService)
    {
        $this->produitService = $produitService;

        return $this;
    }

    /**
     * Get produitService
     *
     * @return \DCI\DciBundle\Entity\ProduitService
     
    public function getProduitService()
    {
        return $this->produitService;
    }
    */
    
    /**
     * Generates the magic method
     * 
     */
    public function __toString(){
    
        return $this->getNonMarchandise();
      
    }

    /**
     * Set natuteDuMarcha
     *
     * @param string $natuteDuMarcha
     *
     * @return Marchandise
     */
    public function setNatuteDuMarcha($natuteDuMarcha)
    {
        $this->natuteDuMarcha = $natuteDuMarcha;

        return $this;
    }

    /**
     * Get natuteDuMarcha
     *
     * @return string
     */
    public function getNatuteDuMarcha()
    {
        return $this->natuteDuMarcha;
    }

    /**
     * Set nonMarchandise
     *
     * @param string $nonMarchandise
     *
     * @return Marchandise
     */
    public function setNonMarchandise($nonMarchandise)
    {
        $this->nonMarchandise = $nonMarchandise;

        return $this;
    }

    /**
     * Get nonMarchandise
     *
     * @return string
     */
    public function getNonMarchandise()
    {
        return $this->nonMarchandise;
    }

    /**
     * Set typeMarchandise
     *
     * @param string $typeMarchandise
     *
     * @return Marchandise
     */
    public function setTypeMarchandise($typeMarchandise)
    {
        $this->typeMarchandise = $typeMarchandise;

        return $this;
    }

    /**
     * Get typeMarchandise
     *
     * @return string
     */
    public function getTypeMarchandise()
    {
        return $this->typeMarchandise;
    }

    /**
     * Set entite
     *
     * @param \DCI\DciBundle\Entity\Entite $entite
     *
     * @return Marchandise
     */
    public function setEntite(\DCI\DciBundle\Entity\Entite $entite)
    {
        $this->entite = $entite;

        return $this;
    }

    /**
     * Get entite
     *
     * @return \DCI\DciBundle\Entity\Entite
     */
    public function getEntite()
    {
        return $this->entite;
    }
}
