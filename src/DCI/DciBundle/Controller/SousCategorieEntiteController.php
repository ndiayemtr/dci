<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\SousCategorieEntite;
use DCI\DciBundle\Entity\CategorieEntite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Souscategorieentite controller.
 *
 */
class SousCategorieEntiteController extends Controller
{
    /**
     * Lists all sousCategorieEntite entities.
     *
     */
    public function indexAction($page)
    {
              if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 10;
        $em = $this->getDoctrine()->getManager();

        $sousCategorieEntites = $em->getRepository('DciBundle:SousCategorieEntite')->allSousCategorieEntite($page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($sousCategorieEntites) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/souscategorieentite/index.html.twig', array(
            'sousCategorieEntites' => $sousCategorieEntites,
            'page' => $page,
            'nbrTotalPages' => $nbrTotalPages,
        ));
    }

	public function sousCategorieLierEntiteAction($id, $page)
    {
              if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
        $nbrAttPage = 10;
        $em = $this->getDoctrine()->getManager();

        $sousCategorieEntites = $em->getRepository('DciBundle:SousCategorieEntite')->sousCategorieLierEntite($id, $page, $nbrAttPage);
        $nbrTotalPages = ceil(count($sousCategorieEntites) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/souscategorieentite/index.html.twig', array(
            'sousCategorieEntites' => $sousCategorieEntites,
            'page' => $page,
            'id' => $id,
            'nbrTotalPages' => $nbrTotalPages,
        ));
    }



    /**
     * Creates a new sousCategorieEntite entity.
     *
     */
    public function newAction(Request $request)
    {
        $sousCategorieEntite = new Souscategorieentite();
		
        $form = $this->createForm('DCI\DciBundle\Form\SousCategorieEntiteType', $sousCategorieEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$numero = $em->getRepository('DciBundle:SousCategorieEntite')->getNumeroDispo();
			$sousCategorieEntite->setCode($numero);
            $em->persist($sousCategorieEntite);
            $em->flush();

            return $this->redirectToRoute('souscategorieentite_show', array('id' => $sousCategorieEntite->getId()));
        }

        return $this->render('form_dci/souscategorieentite/new.html.twig', array(
            'sousCategorieEntite' => $sousCategorieEntite,
            'form' => $form->createView(),
        ));
    }
    public function addSousCateD1ProduitActionAction(Request $request, CategorieEntite $categorieEntite)
    {
        $sousCategorieEntite = new SousCategorieEntite();
        $form = $this->createForm('DCI\DciBundle\Form\AddSousCategorieEntiteType', $sousCategorieEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
			$numero = $em->getRepository('DciBundle:SousCategorieEntite')->getNumeroDispo();
			$rest = substr($numero, 0, 1);
        	if ($categorieEntite->getTypeCat() == 'Produit') {
				$rest = substr($numero, 0, 1);
				if ($rest== 'S') {
					$numero = str_replace('S', 'P', $numero);
					$sousCategorieEntite->setCode($numero);
				} 
			} else {
				if ($rest== 'P') {
					$numero = str_replace('P', 'S', $numero);
					$sousCategorieEntite->setCode($numero);
				} 
			}
			
            $sousCategorieEntite->setSousCategorieEntite($categorieEntite);
            $em->persist($sousCategorieEntite);
            $em->flush();

            return $this->redirectToRoute('arborescence_index');
        }

        return $this->render('form_dci/souscategorieentite/new.html.twig', array(
            'sousCategorieEntite' => $sousCategorieEntite,
            'categorieEntite' => $categorieEntite,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sousCategorieEntite entity.
     *
     */
    public function showAction(SousCategorieEntite $sousCategorieEntite)
    {
        $deleteForm = $this->createDeleteForm($sousCategorieEntite);

        return $this->render('form_dci/souscategorieentite/show.html.twig', array(
            'sousCategorieEntite' => $sousCategorieEntite,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sousCategorieEntite entity.
     *
     */
    public function editAction(Request $request, SousCategorieEntite $sousCategorieEntite)
    {
        $deleteForm = $this->createDeleteForm($sousCategorieEntite);
        $editForm = $this->createForm('DCI\DciBundle\Form\SousCategorieEntiteType', $sousCategorieEntite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('souscategorieentite_show', array('id' => $sousCategorieEntite->getId()));
        }

        return $this->render('form_dci/souscategorieentite/edit.html.twig', array(
            'sousCategorieEntite' => $sousCategorieEntite,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sousCategorieEntite entity.
     *
     */
    public function deleteAction(Request $request, SousCategorieEntite $sousCategorieEntite)
    {
        $form = $this->createDeleteForm($sousCategorieEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sousCategorieEntite);
            $em->flush();
        }

        return $this->redirectToRoute('souscategorieentite_index');
    }

    /**
     * Creates a form to delete a sousCategorieEntite entity.
     *
     * @param SousCategorieEntite $sousCategorieEntite The sousCategorieEntite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(SousCategorieEntite $sousCategorieEntite)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('souscategorieentite_delete', array('id' => $sousCategorieEntite->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
