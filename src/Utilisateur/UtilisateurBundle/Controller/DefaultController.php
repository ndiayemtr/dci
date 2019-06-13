<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller{
    
     public function indexAction() {

        
                // On vérifie que l'utilisateur dispose bien du rôle ROLE_AUTEUR
        if ($this->get('security.authorization_checker')->isGranted('ROLE_ADMIN')) {
            
            return $this->redirectToRoute('admin');
   

        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_COLLECTEUR_DEPART')) {

             return $this->redirectToRoute('utilisateur_collecteur');            

        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_COLLECTEUR_REGION')) {

             return $this->redirectToRoute('utilisateur_collecteur');
             
        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_DECIDEUR_DEPART')) {

             return $this->redirectToRoute('utilisateur_decideur');
             
        }elseif ($this->get('security.authorization_checker')->isGranted('ROLE_DECIDEUR_REGION')) {

             return $this->redirectToRoute('utilisateur_decideur');
        }
        elseif ($this->get('security.authorization_checker')->isGranted('ROLE_DECIDEUR_NATION')) {

             return $this->redirectToRoute('utilisateur_decideur');
        }
        elseif ($this->get('security.authorization_checker')->isGranted('ROLE_GESTIONNAIRE')) {

             return $this->redirectToRoute('utilisateur_decideur');
        }
        
        
        
        else{
            // Sinon on déclenche une exception « Accès interdit »
            //throw new AccessDeniedException('Accès limité .');
            return  $this->redirectToRoute('fos_user_security_login');


        }
        
        
    }

    public function testeAction()
    {
        return $this->render('UtilisateurBundle:Default:teste.html.twig');
    }
}
