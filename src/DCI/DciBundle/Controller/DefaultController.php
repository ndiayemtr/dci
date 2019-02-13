<?php

namespace DCI\DciBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('DciBundle:Default:index.html.twig');
    }
}
