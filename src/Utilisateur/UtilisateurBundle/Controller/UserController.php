<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Utilisateur\UtilisateurBundle\Entity\Admin;
use Utilisateur\UtilisateurBundle\Entity\Collecteur;
use Utilisateur\UtilisateurBundle\Entity\Decideur;
use Utilisateur\UtilisateurBundle\Entity\Gestionnaire;
use Utilisateur\UtilisateurBundle\Entity\UserConnexion;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AdminController AS BaseAdminController;

/**
 * Description of UserController
 *
 * @author merDioufa
 */
class UserController extends BaseAdminController {

    /**
     * @param object $entity
     */
    protected function prePersistEntity($entity) {
        $em = $this->getDoctrine()->getManager();

        $user = new UserConnexion();

        if ($entity instanceof Collecteur) {
            if ($entity->getTypeCollecteur() == 'Departemental') {
                $user->addRole("ROLE_COLLECTEUR_DEPART");
            } elseif ($entity->getTypeCollecteur() == 'Regionale') {
                $user->addRole("ROLE_COLLECTEUR_REGION");
            }
        } elseif ($entity instanceof Decideur) {
            if ($entity->getTypeDecdeur() == 'Departemental') {
                $user->addRole("ROLE_DECIDEUR_DEPART");
            } elseif ($entity->getTypeDecdeur() == 'Regionale') {
                $user->addRole("ROLE_DECIDEUR_REGION");
            } elseif ($entity->getTypeDecdeur() == 'Nationnale') {
                $user->addRole("ROLE_DECIDEUR_NATION");
            }

            //var_dump($user->getRoles());
        } elseif ($entity instanceof Admin) {
            $user->addRole("ROLE_ADMIN");
        }

        $user->setSalt($entity->getPrenom());
        $user->setUsername($entity->getPrenom());
        $user->setEnabled(true);
        $user->setPlainPassword($entity->getNom());
        $user->setUsernameCanonical($entity->getNom());
        $user->setEmailCanonical($entity->getNom() . "@gmail.com");
        $user->setEmail($entity->getNom() . "@gmail.com");
        
        $em->persist($user);
        $em->flush();
        $entity->setUserConnexion($user);
    }

}
