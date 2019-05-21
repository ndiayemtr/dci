<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use DCI\DciBundle\Entity\Entite;
use DCI\DciBundle\Entity\CategorieEntite;
use DCI\DciBundle\Entity\AttributEntite;
use DCI\DciBundle\Entity\Marchandise;
use DCI\DciBundle\Entity\AttributMarchandise;
use DCI\DciBundle\Entity\Indicateur;
use DCI\DciBundle\Entity\Relever;

use DCI\DciBundle\Form\EntiteType;
use DCI\DciBundle\Form\CategorieEntiteType;
use DCI\DciBundle\Form\AttributEntiteType;
use DCI\DciBundle\Form\MarchandiseType;
use DCI\DciBundle\Form\AttributMarchandiseType;
use DCI\DciBundle\Form\IndicateurType;
use DCI\DciBundle\Form\ReleverType;


class AdminController extends Controller {
    /**
     * Permet d'ajouter une nouvelle entité
     * @param Request $request
     * @return type
     */
    public function addEtititeAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $entite = new Entite();
        $form = $this->createForm(EntiteType::class, $entite);
        $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
            
            $em->persist($entite);
            $em->flush();
        
         }
        return $this->render('UtilisateurBundle:dci/admin:add_entite.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Ajouter une categorie pour cette entité
     * 
     * @param Request $request
     * @return type
     */
    public function addCategorieEtititeAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $categorieEntite = new CategorieEntite();
        $form = $this->createForm(CategorieEntiteType::class, $categorieEntite);
        $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
            $em->persist($categorieEntite);
            $em->flush();
            
             return $this->redirectToRoute('utilisateur_categorie_entite');
                
        
         }
        return $this->render('UtilisateurBundle:dci/admin:add_categorie_entite.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Ajout des attributs sumpplementaire aux entites
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function addAttributEtititeAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $attributEntite = new AttributEntite();
        $form = $this->createForm(AttributEntiteType::class, $attributEntite);
        $form->handleRequest($request);
        $entite = $em->getRepository('DciBundle:Entite')->find($id);
        
        if ($request->isMethod('POST') && $form->isValid()) {
             
             $attributEntite->setEntite($entite);
            
             $em->persist($attributEntite);
             $em->flush();
            
             return $this->redirectToRoute('utilisateur_attribut_entite', array('id' => $id));                
        
         }
         
        return $this->render('UtilisateurBundle:dci/admin:add_attribut_entite.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    public function addAttributMarchandiseAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $attributMarchandise = new AttributMarchandise();
        $form = $this->createForm(AttributMarchandiseType::class, $attributMarchandise);
        $form->handleRequest($request);
        $marchandise = $em->getRepository('DciBundle:Marchandise')->find($id);
        
        if ($request->isMethod('POST') && $form->isValid()) {
             
             $attributMarchandise->setMarchandise($marchandise);
            
             $em->persist($attributMarchandise);
             $em->flush();
            
             return $this->redirectToRoute('utilisateur_attribut_marchandise', array('id' => $id));                
        
         }
         
        return $this->render('UtilisateurBundle:dci/admin:add_attribut_marchandise.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    public function addMarchandiseAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $marchandise = new Marchandise();
        $form = $this->createForm(MarchandiseType::class, $marchandise);
        $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
             $entite = $em->getRepository('DciBundle:Entite')->find($id);
             $marchandise->setEntite($entite);
             $em->persist($marchandise);
             $em->flush();
            
             return $this->redirectToRoute('utilisateur_marchandise', array('id' => $id));                
        
         }
        return $this->render('UtilisateurBundle:dci/admin:add_marchandise.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Permet de faire un indicateur sur la marchandise
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function indicateurAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $indicateur = new Indicateur();
        $form = $this->createForm(IndicateurType::class, $indicateur);
        $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
             $marchandise = $em->getRepository('DciBundle:Marchandise')->find($id);
             $indicateur->setMarchandise($marchandise);
             $em->persist($indicateur);
             $em->flush();
            
             return $this->redirectToRoute('utilisateur_indicateur', array('id' => $id));                
        
         }
        return $this->render('UtilisateurBundle:dci/collecteur:add_indicateur.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    public function releverAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $relever = new Relever();
        $form = $this->createForm(ReleverType::class, $relever);
        $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
             $indcateur = $em->getRepository('DciBundle:Indicateur')->find($id);
             $relever->setIndicateur($indcateur);
             $em->persist($relever);
             $em->flush();
            
             return $this->redirectToRoute('utilisateur_relever', array('id' => $id));                
        
         }
        return $this->render('UtilisateurBundle:dci/collecteur:add_relever.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
}
