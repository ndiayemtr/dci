<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\Consommateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Consommateur controller.
 *
 */
class ConsommateurController extends Controller {

    /**
     * Lists all consommateur entities.
     *
     */
    public function indexAction($page) {
             if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

        //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $consommateurs = $em->getRepository('DciBundle:Consommateur')->allConsommateurs($page, $nbrAttPage);
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
        //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($consommateurs) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/consommateur/index.html.twig', array(
                    'consommateurs' => $consommateurs,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    public function consommateurLierAunMarchandiseAction($id, $page) {
             if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

        //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $consommateurs = $em->getRepository('DciBundle:Consommateur')->allconsommateurLierAunMarchandise($page, $nbrAttPage, $id);
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
        //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($consommateurs) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/consommateur/index.html.twig', array(
                    'consommateurs' => $consommateurs,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new consommateur entity.
     *
     */
    public function newAction(Request $request) {
        $consommateur = new Consommateur();
        $form = $this->createForm('DCI\DciBundle\Form\ConsommateurType', $consommateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($consommateur);
            $em->flush();

            return $this->redirectToRoute('consommateur_show', array('id' => $consommateur->getId()));
        }

        return $this->render('form_dci/consommateur/new.html.twig', array(
                    'consommateur' => $consommateur,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a consommateur entity.
     *
     */
    public function showAction(Consommateur $consommateur) {
        $deleteForm = $this->createDeleteForm($consommateur);

        return $this->render('form_dci/consommateur/show.html.twig', array(
                    'consommateur' => $consommateur,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing consommateur entity.
     *
     */
    public function editAction(Request $request, Consommateur $consommateur) {
        $deleteForm = $this->createDeleteForm($consommateur);
        $editForm = $this->createForm('DCI\DciBundle\Form\ConsommateurType', $consommateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consommateur_show', array('id' => $consommateur->getId()));
        }

        return $this->render('form_dci/consommateur/edit.html.twig', array(
                    'consommateur' => $consommateur,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a consommateur entity.
     *
     */
    public function deleteAction(Request $request, Consommateur $consommateur) {
        $form = $this->createDeleteForm($consommateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($consommateur);
            $em->flush();
        }

        return $this->redirectToRoute('consommateur_index');
    }

    /**
     * Creates a form to delete a consommateur entity.
     *
     * @param Consommateur $consommateur The consommateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Consommateur $consommateur) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('consommateur_delete', array('id' => $consommateur->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
