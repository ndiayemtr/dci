<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of DecideurController
 *
 * @author merDioufa
 */
class DecideurController extends Controller {
   
     public function indexAction(){
        return $this->render('UtilisateurBundle:dci/decideur:index.html.twig');
    }
}
