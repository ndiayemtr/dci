<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\CategorieEntite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieentite controller.
 *
 */
class CategorieEntiteController extends Controller {

    /**
     * Lists all categorieEntite entities.
     *
     */
    public function indexAction($page) {
        
           if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $categorieEntites = $em->getRepository('DciBundle:CategorieEntite')->allCategorieEntite($page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($categorieEntites) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }
         
        return $this->render('form_dci/categorieentite/index.html.twig', array(
                    'categorieEntites' => $categorieEntites,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new categorieEntite entity.
     *
     */
    public function newAction(Request $request) {
        $categorieEntite = new Categorieentite();
        $form = $this->createForm('DCI\DciBundle\Form\CategorieEntiteType', $categorieEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorieEntite);
            $em->flush();

            return $this->redirectToRoute('categorieentite_show', array('id' => $categorieEntite->getId()));
        }

        return $this->render('form_dci/categorieentite/new.html.twig', array(
                    'categorieEntite' => $categorieEntite,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categorieEntite entity.
     *
     */
    public function showAction(CategorieEntite $categorieEntite) {
        $deleteForm = $this->createDeleteForm($categorieEntite);

        return $this->render('form_dci/categorieentite/show.html.twig', array(
                    'categorieEntite' => $categorieEntite,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categorieEntite entity.
     *
     */
    public function editAction(Request $request, CategorieEntite $categorieEntite) {
        $deleteForm = $this->createDeleteForm($categorieEntite);
        $editForm = $this->createForm('DCI\DciBundle\Form\CategorieEntiteType', $categorieEntite);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categorieentite_show', array('id' => $categorieEntite->getId()));
        }

        return $this->render('form_dci/categorieentite/edit.html.twig', array(
                    'categorieEntite' => $categorieEntite,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categorieEntite entity.
     *
     */
    public function deleteAction(Request $request, CategorieEntite $categorieEntite) {
        $form = $this->createDeleteForm($categorieEntite);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categorieEntite);
            $em->flush();
        }

        return $this->redirectToRoute('categorieentite_index');
    }

    /**
     * Creates a form to delete a categorieEntite entity.
     *
     * @param CategorieEntite $categorieEntite The categorieEntite entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategorieEntite $categorieEntite) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('categorieentite_delete', array('id' => $categorieEntite->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
