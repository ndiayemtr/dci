<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\Marchandise;
use DCI\DciBundle\Entity\SousCategorieEntite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Marchandise controller.
 *
 */
class MarchandiseController extends Controller {

    /**
     * Lists all marchandise entities.
     *
     */
    public function indexAction($page) {
        
             if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $marchandises = $em->getRepository('DciBundle:Marchandise')->allMarchandise($page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($marchandises) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/marchandise/index.html.twig', array(
                    'marchandises' => $marchandises,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
	
	public function marchandiseDunProduitAction($page, $id) {
        
             if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $marchandises = $em->getRepository('DciBundle:Marchandise')->marchandiseDunProduit($page, $nbrAttPage, $id);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($marchandises) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/marchandise/index.html.twig', array(
                    'marchandises' => $marchandises,
                    'page' => $page,
                    'id' => $id,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
	

    /**
     * Creates a new marchandise entity.
     *
     */
    public function newAction(Request $request) {
        $marchandise = new Marchandise();
        $form = $this->createForm('DCI\DciBundle\Form\MarchandiseType', $marchandise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($marchandise);
            $em->flush();

            return $this->redirectToRoute('marchandise_show', array('id' => $marchandise->getId()));
        }

        return $this->render('form_dci/marchandise/new.html.twig', array(
                    'marchandise' => $marchandise,
                    'form' => $form->createView(),
        ));
    }

    public function addMarchaD1SousCateAction(Request $request, SousCategorieEntite $sousCategorieEntite) {
         $em = $this->getDoctrine()->getManager();
        $marchandise = new Marchandise();
        $numero = $em->getRepository('DciBundle:Marchandise')->getNumeroReference();
        
        $form = $this->createForm('DCI\DciBundle\Form\AddMarchandiseType', $marchandise);
        
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
           
            $marchandise->setSousCategorieEntite($sousCategorieEntite);
            $marchandise->setReference($numero);
            $em->persist($marchandise);
            $em->flush();

            return $this->redirectToRoute('marchandise_show', array('id' => $marchandise->getId()));
        }

        return $this->render('form_dci/marchandise/add_marchandise.html.twig', array(
                    'marchandise' => $marchandise,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a marchandise entity.
     *
     */
    public function showAction(Marchandise $marchandise) {
        $deleteForm = $this->createDeleteForm($marchandise);

        return $this->render('form_dci/marchandise/show.html.twig', array(
                    'marchandise' => $marchandise,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing marchandise entity.
     *
     */
    public function editAction(Request $request, Marchandise $marchandise) {
        $deleteForm = $this->createDeleteForm($marchandise);
        $editForm = $this->createForm('DCI\DciBundle\Form\MarchandiseType', $marchandise);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('marchandise_edit', array('id' => $marchandise->getId()));
        }

        return $this->render('form_dci/marchandise/edit.html.twig', array(
                    'marchandise' => $marchandise,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a marchandise entity.
     *
     */
    public function deleteAction(Request $request, Marchandise $marchandise) {
        $form = $this->createDeleteForm($marchandise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($marchandise);
            $em->flush();
        }

        return $this->redirectToRoute('marchandise_lier', array('id' => $marchandise->getSousCategorieEntite()->getId()));
    }

    /**
     * Creates a form to delete a marchandise entity.
     *
     * @param Marchandise $marchandise The marchandise entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Marchandise $marchandise) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('marchandise_delete', array('id' => $marchandise->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
