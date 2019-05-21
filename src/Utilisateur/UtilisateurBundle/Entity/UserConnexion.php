<?php

namespace Utilisateur\UtilisateurBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;

/**
 * UserConnexion
 *
 * @ORM\Table(name="user_connexion")
 * @ORM\Entity(repositoryClass="Utilisateur\UtilisateurBundle\Repository\UserConnexionRepository")
 */
class UserConnexion extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    
    public function __construct() {
        parent::__construct();

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
}
