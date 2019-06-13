<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Utilisateur\UtilisateurBundle\Entity\InfoUser as info;

use Doctrine\ORM\Mapping as ORM;

/**
 * Collecteur
 *
 * @ORM\Table(name="collecteur")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\CollecteurRepository")
 */
class Collecteur 
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
     * @ORM\Column(name="typeCollecteur", type="string", columnDefinition="enum('Departemental', 'Regionale')")
     */
    private $typeCollecteur;
    
    /**
     * @ORM\OneToOne(targetEntity="DCI\DciBundle\Entity\Departement", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $departement;
    
    /**
     * @ORM\OneToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\UserConnexion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userConnexion;
    
    /**
     * @var int
     *
     * @ORM\Column(name="numeroTel", type="integer")
     */
    private $numeroTel;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * Set numeroTel
     *
     * @param integer $numeroTel
     *
     * @return InfoUser
     */
    public function setNumeroTel($numeroTel)
    {
        $this->numeroTel = $numeroTel;

        return $this;
    }

    /**
     * Get numeroTel
     *
     * @return int
     */
    public function getNumeroTel()
    {
        return $this->numeroTel;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return InfoUser
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return InfoUser
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }


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
     * Set typeCollecteur
     *
     * @param string $typeCollecteur
     *
     * @return Collecteur
     */
    public function setTypeCollecteur($typeCollecteur)
    {
        $this->typeCollecteur = $typeCollecteur;

        return $this;
    }

    /**
     * Get typeCollecteur
     *
     * @return string
     */
    public function getTypeCollecteur()
    {
        return $this->typeCollecteur;
    }

    /**
     * Set departement
     *
     * @param \DCI\DciBundle\Entity\Departement $departement
     *
     * @return Collecteur
     */
    public function setDepartement(\DCI\DciBundle\Entity\Departement $departement)
    {
        $this->departement = $departement;

        return $this;
    }

    /**
     * Get departement
     *
     * @return \DCI\DciBundle\Entity\Departement
     */
    public function getDepartement()
    {
        return $this->departement;
    }

    /**
     * Set userConnexion
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\UserConnexion $userConnexion
     *
     * @return Collecteur
     */
    public function setUserConnexion(\Utilisateur\UtilisateurBundle\Entity\UserConnexion $userConnexion)
    {
        $this->userConnexion = $userConnexion;

        return $this;
    }

    /**
     * Get userConnexion
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\UserConnexion
     */
    public function getUserConnexion()
    {
        return $this->userConnexion;
    }
}
