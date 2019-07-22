<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\Relever;
use DCI\DciBundle\Entity\IndicaProdSer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Relever controller.
 *
 */
class ReleverController extends Controller
{
    /**
     * Lists all relever entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $relevers = $em->getRepository('DciBundle:Relever')->findAll();

        return $this->render('form_dci/relever/index.html.twig', array(
            'relevers' => $relevers,
        ));
    }

    /**
     * Creates a new relever entity.
     *
     */
    public function newAction(IndicaProdSer $indicaProdSer, Request $request)
    {
        $relever = new Relever();
        $form = $this->createForm('DCI\DciBundle\Form\ReleverType', $relever);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $relever->setIndicaProdSer($indicaProdSer);
            $em->persist($relever);
            $em->flush();

            return $this->redirectToRoute('relever_show', array('id' => $relever->getId()));
        }

        return $this->render('form_dci/relever/new.html.twig', array(
            'relever' => $relever,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a relever entity.
     *
     */
    public function showAction(Relever $relever)
    {
        $deleteForm = $this->createDeleteForm($relever);

        return $this->render('form_dci/relever/show.html.twig', array(
            'relever' => $relever,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing relever entity.
     *
     */
    public function editAction(Request $request, Relever $relever)
    {
        $deleteForm = $this->createDeleteForm($relever);
        $editForm = $this->createForm('DCI\DciBundle\Form\ReleverType', $relever);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('relever_show', array('id' => $relever->getId()));
        }

        return $this->render('form_dci/relever/edit.html.twig', array(
            'relever' => $relever,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a relever entity.
     *
     */
    public function deleteAction(Request $request, Relever $relever)
    {
        $form = $this->createDeleteForm($relever);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($relever);
            $em->flush();
        }

        return $this->redirectToRoute('relever_index');
    }

    /**
     * Creates a form to delete a relever entity.
     *
     * @param Relever $relever The relever entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Relever $relever)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('relever_delete', array('id' => $relever->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
