<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\AdminRepository")
 */
class Admin
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
     * Set infoUser
     *
     * @param \Utilisateur\UtilisateurBundle\Entity\InfoUser $infoUser
     *
     * @return Admin
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
     * @return Admin
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
