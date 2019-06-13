<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Utilisateur\UtilisateurBundle\Entity\InfoUser as info;

use Doctrine\ORM\Mapping as ORM;

/**
 * Decideur
 *
 * @ORM\Table(name="decideur")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\DecideurRepository")
 */
class Decideur 
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
     * @ORM\Column(name="TypeDecdeur", type="string", columnDefinition="enum('Departemental', 'Regionale', 'Nationnale')")
     */
    private $typeDecdeur;
    
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
     * Set typeDecdeur
     *
     * @param string $typeDecdeur
     *
     * @return Decideur
     */
    public function setTypeDecdeur($typeDecdeur)
    {
        $this->typeDecdeur = $typeDecdeur;

        return $this;
    }

    /**
     * Get typeDecdeur
     *
     * @return string
     */
    public function getTypeDecdeur()
    {
        return $this->typeDecdeur;
    }

    /**
     * Set infoUser
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\InfoUser $infoUser
     *
     * @return Decideur
     */
    public function setInfoUser(\Utilisateur\UtilisateurBundle\Entity\InfoUser $infoUser)
    {
        $this->infoUser = $infoUser;

        return $this;
    }

    /**
     * Get infoUser
     *
     * @return \Utilisateur\UtilisateurBundle\Entity\InfoUser
     */
    public function getInfoUser()
    {
        return $this->infoUser;
    }

    /**
     * Set userConnexion
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\UserConnexion $userConnexion
     *
     * @return Decideur
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
