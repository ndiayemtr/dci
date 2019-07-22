<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\ReleverMarchandise;
use DCI\DciBundle\Entity\IndicaMarcha;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Relevermarchandise controller.
 *
 */
class ReleverMarchandiseController extends Controller
{
    /**
     * Lists all releverMarchandise entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $releverMarchandises = $em->getRepository('DciBundle:ReleverMarchandise')->findAll();

        return $this->render('form_dci/relevermarchandise/index.html.twig', array(
            'releverMarchandises' => $releverMarchandises,
        ));
    }

    /**
     * Creates a new releverMarchandise entity.
     *
     */
    public function newAction(IndicaMarcha $indicaMarcha, Request $request)
    {
        $releverMarchandise = new Relevermarchandise();
        $form = $this->createForm('DCI\DciBundle\Form\ReleverMarchandiseType', $releverMarchandise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $releverMarchandise->setIndicaMarcha($indicaMarcha);
            $em->persist($releverMarchandise);
            $em->flush();

            return $this->redirectToRoute('relevermarchandise_show', array('id' => $releverMarchandise->getId()));
        }

        return $this->render('form_dci/relevermarchandise/new.html.twig', array(
            'releverMarchandise' => $releverMarchandise,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a releverMarchandise entity.
     *
     */
    public function showAction(ReleverMarchandise $releverMarchandise)
    {
        $deleteForm = $this->createDeleteForm($releverMarchandise);

        return $this->render('form_dci/relevermarchandise/show.html.twig', array(
            'releverMarchandise' => $releverMarchandise,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing releverMarchandise entity.
     *
     */
    public function editAction(Request $request, ReleverMarchandise $releverMarchandise)
    {
        $deleteForm = $this->createDeleteForm($releverMarchandise);
        $editForm = $this->createForm('DCI\DciBundle\Form\ReleverMarchandiseType', $releverMarchandise);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('relevermarchandise_show', array('id' => $releverMarchandise->getId()));
        }

        return $this->render('form_dci/relevermarchandise/edit.html.twig', array(
            'releverMarchandise' => $releverMarchandise,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a releverMarchandise entity.
     *
     */
    public function deleteAction(Request $request, ReleverMarchandise $releverMarchandise)
    {
        $form = $this->createDeleteForm($releverMarchandise);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($releverMarchandise);
            $em->flush();
        }

        return $this->redirectToRoute('relevermarchandise_index');
    }

    /**
     * Creates a form to delete a releverMarchandise entity.
     *
     * @param ReleverMarchandise $releverMarchandise The releverMarchandise entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReleverMarchandise $releverMarchandise)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('relevermarchandise_delete', array('id' => $releverMarchandise->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
