<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\CategorieEntite;
use DCI\DciBundle\Entity\SousCategorieEntite;
use DCI\DciBundle\Entity\Marchandise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieentite controller.
 *
 */
class ArborescenceController extends Controller {

    /**
     * Lists all sousCategorieEntite entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $categorieEntites = $em->getRepository('DciBundle:CategorieEntite')->findAll();
        $sousCategorieEntites = $em->getRepository('DciBundle:SousCategorieEntite')->findAll();
        $marchandises = $em->getRepository('DciBundle:Marchandise')->findAll();
        $operatSousCateg = $em->getRepository('DciBundle:OperatSousCateg')->findAll();
        $consommateurs = $em->getRepository('DciBundle:Consommateur')->findAll();
        return $this->render('form_dci/arborescence/index.html.twig', array(
                    'categorieEntites' => $categorieEntites,
                    'sousCategorieEntites' => $sousCategorieEntites,
                    'marchandises' => $marchandises,
                    'operatSousCategs' => $operatSousCateg,
                    'consommateurs' => $consommateurs,
        ));
    }
    
    public function listSousCategDunProdAction(){
        
        $em = $this->getDoctrine()->getManager();

        $categorieEntites = $em->getRepository('DciBundle:CategorieEntite')->findAll();
        $sousCategorieEntites = $em->getRepository('DciBundle:SousCategorieEntite')->findAll();
        $marchandises = $em->getRepository('DciBundle:Marchandise')->findAll();
        return $this->render('form_dci/arborescence/arborescence2.html.twig', array(
                    'categorieEntites' => $categorieEntites,
                    'sousCategorieEntites' => $sousCategorieEntites,
                    'marchandises' => $marchandises,
        ));
    }

}
