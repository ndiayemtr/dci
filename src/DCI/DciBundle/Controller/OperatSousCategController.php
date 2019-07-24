<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\OperatSousCateg;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Operatsouscateg controller.
 *
 */
class OperatSousCategController extends Controller {

    /**
     * Lists all operatSousCateg entities.
     *
     */
    public function indexAction($page) {

        if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

        //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $operatSousCategs = $em->getRepository('DciBundle:OperatSousCateg')->allOperatSousCateg($page, $nbrAttPage);
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
        //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($operatSousCategs) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/operatsouscateg/index.html.twig', array(
                    'operatSousCategs' => $operatSousCategs,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    public function operatLierAUnProduitAction($id, $page){
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

        //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $operatSousCategs = $em->getRepository('DciBundle:OperatSousCateg')->alloperatLierAUnProduit($page, $nbrAttPage, $id);
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
        //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($operatSousCategs) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/operatsouscateg/index.html.twig', array(
                    'operatSousCategs' => $operatSousCategs,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
        
    }

    /**
     * Creates a new operatSousCateg entity.
     *
     */
    public function newAction(Request $request) {
        $operatSousCateg = new Operatsouscateg();
        $form = $this->createForm('DCI\DciBundle\Form\OperatSousCategType', $operatSousCateg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operatSousCateg);
            $em->flush();

            return $this->redirectToRoute('operatsouscateg_show', array('id' => $operatSousCateg->getId()));
        }

        return $this->render('form_dci/operatsouscateg/new.html.twig', array(
                    'operatSousCateg' => $operatSousCateg,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a operatSousCateg entity.
     *
     */
    public function showAction(OperatSousCateg $operatSousCateg) {
        $deleteForm = $this->createDeleteForm($operatSousCateg);

        return $this->render('form_dci/operatsouscateg/show.html.twig', array(
                    'operatSousCateg' => $operatSousCateg,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operatSousCateg entity.
     *
     */
    public function editAction(Request $request, OperatSousCateg $operatSousCateg) {
        $deleteForm = $this->createDeleteForm($operatSousCateg);
        $editForm = $this->createForm('DCI\DciBundle\Form\OperatSousCategType', $operatSousCateg);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operatsouscateg_show', array('id' => $operatSousCateg->getId()));
        }

        return $this->render('form_dci/operatsouscateg/edit.html.twig', array(
                    'operatSousCateg' => $operatSousCateg,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a operatSousCateg entity.
     *
     */
    public function deleteAction(Request $request, OperatSousCateg $operatSousCateg) {
        $form = $this->createDeleteForm($operatSousCateg);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operatSousCateg);
            $em->flush();
        }

        return $this->redirectToRoute('operatsouscateg_index');
    }

    /**
     * Creates a form to delete a operatSousCateg entity.
     *
     * @param OperatSousCateg $operatSousCateg The operatSousCateg entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(OperatSousCateg $operatSousCateg) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('operatsouscateg_delete', array('id' => $operatSousCateg->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
