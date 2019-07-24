<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\Operateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Operateur controller.
 *
 */
class OperateurController extends Controller
{
    /**
     * Lists all operateur entities.
     *
     */
    public function indexAction($page)
    {
         if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

        //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $operateurs = $em->getRepository('DciBundle:Operateur')->allOpearateurs($page, $nbrAttPage);
        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
        //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($operateurs) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }


        return $this->render('form_dci/operateur/index.html.twig', array(
            'operateurs' => $operateurs,
            'page' => $page,
            'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new operateur entity.
     *
     */
    public function newAction(Request $request)
    {
        $operateur = new Operateur();
        $form = $this->createForm('DCI\DciBundle\Form\OperateurType', $operateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($operateur);
            $em->flush();

            return $this->redirectToRoute('operateur_show', array('id' => $operateur->getId()));
        }

        return $this->render('form_dci/operateur/new.html.twig', array(
            'operateur' => $operateur,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a operateur entity.
     *
     */
    public function showAction(Operateur $operateur)
    {
        $deleteForm = $this->createDeleteForm($operateur);

        return $this->render('form_dci/operateur/show.html.twig', array(
            'operateur' => $operateur,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing operateur entity.
     *
     */
    public function editAction(Request $request, Operateur $operateur)
    {
        $deleteForm = $this->createDeleteForm($operateur);
        $editForm = $this->createForm('DCI\DciBundle\Form\OperateurType', $operateur);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('operateur_show', array('id' => $operateur->getId()));
        }

        return $this->render('form_dci/operateur/edit.html.twig', array(
            'operateur' => $operateur,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a operateur entity.
     *
     */
    public function deleteAction(Request $request, Operateur $operateur)
    {
        $form = $this->createDeleteForm($operateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($operateur);
            $em->flush();
        }

        return $this->redirectToRoute('operateur_index');
    }

    /**
     * Creates a form to delete a operateur entity.
     *
     * @param Operateur $operateur The operateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Operateur $operateur)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('operateur_delete', array('id' => $operateur->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
