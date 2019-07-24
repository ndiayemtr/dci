<?php

namespace Utilisateur\UtilisateurBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of CollecteurController
 *
 * @author merDioufa
 */
class Collecteur_oldController extends Controller {
    
//        public function indexAction(){
//        return $this->render('UtilisateurBundle:dci/collecteur:index.html.twig');
//    }
    
    public function voirlesIndiCaDepartAction($page){
            if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $collecteur = $em ->getRepository('UtilisateurBundle:Collecteur')
                            ->findOneBy(array('userConnexion' => $this->getUser()->getId()));
                    
        $indicateur = $em->getRepository('DciBundle:Indicateur')->lesIndiCaDepart($page, $nbrAttPage, $collecteur->getDepartement()->getId());      
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicateur) / $nbrAttPage);        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
           //return $this->render('PoliceBundle:Attestation:no_view.html.twig');                                        
        }
        
        return $this->render('UtilisateurBundle:dci/collecteur:index.html.twig', array(
                    'indicateur' => $indicateur,
                    'departement' => $collecteur->getDepartement()->getNomDepartement(),
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
        
    }
    public function voirlesReleveDepartAction($page){
            if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        //je fixe je nombre d'annoce par page
        $nbrAttPage = 4;
        
        $em = $this->getDoctrine()->getManager();
        $collecteur = $em ->getRepository('UtilisateurBundle:Collecteur')
                            ->findOneBy(array('userConnexion' => $this->getUser()->getId()));
                    
        $relever = $em->getRepository('DciBundle:Relever')->lesReleveDepart($page, $nbrAttPage, $collecteur->getDepartement()->getId());      
          // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($relever) / $nbrAttPage);        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
           //return $this->render('PoliceBundle:Attestation:no_view.html.twig');                                        
        }
        
        return $this->render('UtilisateurBundle:dci/collecteur:voir-relever.html.twig', array(
                    'relevers' => $relever,
                    'departement' => $collecteur->getDepartement()->getNomDepartement(),
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
        
    }
}
