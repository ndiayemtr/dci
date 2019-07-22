<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use DCI\DciBundle\Entity\Entite;
use DCI\DciBundle\Entity\CategorieEntite;
use DCI\DciBundle\Entity\SousCategorieEntite;
use DCI\DciBundle\Entity\AttributEntite;
use DCI\DciBundle\Entity\Marchandise;
use DCI\DciBundle\Entity\AttributMarchandise;
use DCI\DciBundle\Entity\Indicateur;
use DCI\DciBundle\Entity\Relever;
use DCI\DciBundle\Entity\IndicaProdSer;

use DCI\DciBundle\Form\EntiteType;
use DCI\DciBundle\Form\CategorieEntiteType;
use DCI\DciBundle\Form\SousCategorieEntiteType;
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
            
            return $this->redirectToRoute('utilisateur_entite');
        
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
    
        public function addSousCategorieEtititeAction(Request $request){
        $em = $this->getDoctrine()->getManager();
        $sousCatEntite = new SousCategorieEntite();
        $form = $this->createForm(SousCategorieEntiteType::class, $sousCatEntite);
        $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
            $em->persist($sousCatEntite);
            $em->flush();
            
             return $this->redirectToRoute('utilisateur_sous_cat_entite');
                        
         }
        return $this->render('UtilisateurBundle:dci/admin:add_sous_cat_entite.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
        public function indicaProdSerAction(Request $request, CategorieEntite $categorieEntite){
            $em = $this->getDoctrine()->getManager();
            $IndicaProdSer = new IndicaProdSer();
            $indicateur = new Indicateur();
            $form = $this->createForm(IndicateurType::class, $indicateur);
            $form->handleRequest($request);
        
         if ($request->isMethod('POST') && $form->isValid()) {
            $IndicaProdSer->setCategorieEntite($categorieEntite);
            $IndicaProdSer->setIndicateur($indicateur);
            $em->persist($indicateur);
            $em->persist($IndicaProdSer);
            $em->flush();          
            
             return $this->redirectToRoute('utilisateur_list_sous_cat_entite', array('id' => $categorieEntite->getId()));                       
         }
 
             return $this->render('UtilisateurBundle:dci/collecteur:add_indicateur.html.twig',  array(
                    'form' => $form->createView(),
                    'id' => $categorieEntite->getId(),
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
         $marchandise = $em->getRepository('DciBundle:Marchandise')->find($id);
        
         if ($request->isMethod('POST') && $form->isValid()) {
             

             //$indicateur->setMarchandise($marchandise);
             $em->persist($indicateur);
             $em->flush();
            
             //return $this->redirectToRoute('utilisateur_indicateur', array('id' => $id));                
        
         }
        return $this->render('UtilisateurBundle:dci/collecteur:add_indicateur.html.twig',  array(
                    'form' => $form->createView(),
                    'marchandise' => $marchandise,
        ));
    }
    /**
     * Peret de faire un relévé
     * 
     * @param type $id
     * @param Request $request
     * @return type
     */
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
                    'id' => $id,
        ));
    }
    /**
     * Voir tous les produits disponible
     * 
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
    public function produitsAction($page){
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
         $em = $this->getDoctrine()->getManager();
        $entiteProduit = $em->getRepository('DciBundle:CategorieEntite')->allCategories($page, $nbrAttPage);
        
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($entiteProduit) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }
        return $this->render('UtilisateurBundle:dci/admin:produits.html.twig', array(
                    'entiteProduits' => $entiteProduit,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    public function listMarchandiseAction($id, $page){
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
         $em = $this->getDoctrine()->getManager();
        $marchandiseProduit = $em->getRepository('DciBundle:Marchandise')->marchandiseDunProduit($page, $nbrAttPage, $id);
         $entiteProduit = $em->getRepository('DciBundle:Entite')->find($id);
        
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($marchandiseProduit) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }
        return $this->render('UtilisateurBundle:dci/admin:marchandise_produit.html.twig', array(
                    'marchandiseProduits' => $marchandiseProduit,
                    'page' => $page,
                    'entiteProduit' => $entiteProduit,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    /**
     * La liste des sous cat d'une entite
     * 
     * @param type $id
     * @return type
     */
    public function listSousCatEntiteAction($id){

        $em = $this->getDoctrine()->getManager();
        $list_sousCatEntite = $em->getRepository('DciBundle:SousCategorieEntite')->findBy(array('sousCategorieEntite' => $id));
        $catEntite = $em->getRepository('DciBundle:CategorieEntite')->find($id);
        
        return $this->render('UtilisateurBundle:dci/admin:list_sousCatEntite.html.twig', array(
                    'list_sousCatEntites' => $list_sousCatEntite,
                    'nomCatEntite' => $catEntite->getNomEntite(),
                    'id' => $id,
        ));
    }
    
    /**
     * liste des indicateurs d'une marchandise
     * 
     * @param type $id
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
    public function listIndicateurAction($id, $page){
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
         $em = $this->getDoctrine()->getManager();
        $indicateurMarchandises = $em->getRepository('DciBundle:Indicateur')->indicateurDunMarch($page, $nbrAttPage, $id);
         $marchandise = $em->getRepository('DciBundle:Marchandise')->find($id);
        
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicateurMarchandises) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }
        return $this->render('UtilisateurBundle:dci/admin:liste_indicateur.html.twig', array(
                    'indicateurMarchandises' => $indicateurMarchandises,
                    'page' => $page,
                    'marchandise' => $marchandise,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    public function indicateurAllAction($page){
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
         $em = $this->getDoctrine()->getManager();
        $indicateurMarchandises = $em->getRepository('DciBundle:Indicateur')->indicateurAll($page, $nbrAttPage);
        
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicateurMarchandises) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }
        return $this->render('UtilisateurBundle:dci/admin:all_indicateur.html.twig', array(
                    'indicateurMarchandises' => $indicateurMarchandises,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    /**
     * la liste des categories
     * 
     * @return type
     */
    public function listCategorieAction(){
        
         $em = $this->getDoctrine()->getManager();
        $categories = $em->getRepository('DciBundle:CategorieEntite')->findAll();
 
        return $this->render('UtilisateurBundle:dci/admin:categories.html.twig', array(
                    'categories' => $categories,
        ));
    }
    
    public function litsIndiCatEntiteAction(CategorieEntite $cateEntite){
         $em = $this->getDoctrine()->getManager();
        $listIndiCateEntite = $em->getRepository('DciBundle:IndicaProdSer')->findBy(array('categorieEntite' => $cateEntite->getId()));
 
        return $this->render('UtilisateurBundle:dci/admin:list_indi_cat_entite.html.twig', array(
                    'listIndiCateEntites' => $listIndiCateEntite,
        ));
        
    }
}
