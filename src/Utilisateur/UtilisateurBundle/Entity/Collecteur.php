<?php

namespace Utilisateur\UtilisateurBundle\Entity;

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
     * @ORM\OneToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\InfoUser", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $infoUser;
    
    /**
     * @ORM\OneToOne(targetEntity="Utilisateur\UtilisateurBundle\Entity\UserConnexion", cascade={"persist", "remove"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $userConnexion;


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
     * Set infoUser
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\InfoUser $infoUser
     *
     * @return Collecteur
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
