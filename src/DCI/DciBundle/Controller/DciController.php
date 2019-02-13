<?php

namespace DCI\DciBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use DCI\DciBundle\Entity\ProduitService;
use DCI\DciBundle\Entity\Marchandise;
use DCI\DciBundle\Entity\Prix;

use DCI\DciBundle\Form\ProduitServiceType;
use DCI\DciBundle\Form\PrixType;
use DCI\DciBundle\Form\MarchandiseType;

class DciController extends Controller {
   
    /**
     * Permet d'ajouter un produit ou service
     * @param Request $request
     * @return type
     */
    public function addProduitAction(Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
        $produitService = new ProduitService();
        
         if (isset($_POST['code']) AND isset($_POST['libelle']) AND isset($_POST['categorieProduit']) AND isset($_POST['nomProduit'])) {
            $produitService->setCode($_POST['code']);
            $produitService->setLibelle($_POST['libelle']);
            $produitService->setCategorieProduit($_POST['categorieProduit']);
            $produitService->setNomProduit($_POST['nomProduit']);
            
            $em->persist($produitService);
            $em->flush();
            
            return $this->redirectToRoute('dci_list_produits');
        }
        
        return $this->render('DciBundle:Dci:index.html.twig');
    }
    
    /**
     * Permet d'ajouter une marchandise pour un produit/service
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function addMarchandiseAction($id, Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
        $marchandise = new Marchandise();
        $form = $this->createForm(MarchandiseType::class, $marchandise);
        $form->handleRequest($request);
        
        $produitService = $em->getRepository('DciBundle:ProduitService')->find($id);
        $marchandise->setProduitService($produitService);
        
         if ($request->isMethod('POST') && $form->isValid()) {
            $em->persist($marchandise);
            $em->flush();

            return $this->redirectToRoute('dci_prix', array(
                'id' => $marchandise->getId(),
            ));
        
         }
        return $this->render('DciBundle:Dci:add_marchandise.html.twig',  array(
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Permet d'ajouter un prix our une marchandise
     * @param type $id
     * @param Request $request
     * @return type
     */
    public function addPrixAction($id, Request $request){
        
        $em = $this->getDoctrine()->getManager();
        
        $prix = new Prix();
        $form = $this->createForm(PrixType::class, $prix);
        $form->handleRequest($request);
        
        $machandise = $em->getRepository('DciBundle:Marchandise')->find($id);
        $prix->setMarchandise($machandise);
        
         if ($request->isMethod('POST') && $form->isValid()) {
            $em->persist($prix);
            $em->flush();

            return $this->redirectToRoute('dci_list_produits');
        
         }
        return $this->render('DciBundle:Dci:add_prix.html.twig',  array(
                    'form' => $form->createView(),
                    
        ));
    }
    
    /**
     * affiche liste des produits
     * @return type ProduitService
     */
    public function tousProduitsAction(){
         $em = $this->getDoctrine()->getManager();
         
         $produits = $em->getRepository('DciBundle:ProduitService')->findAll();
         
          return $this->render('DciBundle:Dci:list_produits.html.twig',  array(
                    'listProduits' => $produits,
        ));
    }
    
    public function marchandisesDunProduitsAction($id, Request $request){
        $em = $this->getDoctrine()->getManager();
        $produits = $em->getRepository('DciBundle:ProduitService')->find($id);
        $marchandises = $em->getRepository('DciBundle:Marchandise')->marchtDunProduit($id);

        return $this->render('DciBundle:Dci:list_marchandise.html.twig', array(
                    'marchandises' => $marchandises,
                    'produit' => $produits,
        ));
    }
    
    /**
     * Classification des produits par categorie
     * @return type
     */
    public function classificationProduitsAction(){
        
        return $this->render('DciBundle:Dci:produits.html.twig');
    }
    
    /**
     * Classification des services par categorie
     * @return type
     */
    public function classificationServicesAction(){
        
        return $this->render('DciBundle:Dci:services.html.twig');
    }
}
