<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserConnexion
 *
 * @ORM\Table(name="user_connexion")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\UserConnexionRepository")
 */
class UserConnexion
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}

