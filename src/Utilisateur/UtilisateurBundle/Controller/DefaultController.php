<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('UtilisateurBundle:Default:index.html.twig');
    }
    public function testeAction()
    {
        return $this->render('UtilisateurBundle:Default:teste.html.twig');
    }
}
