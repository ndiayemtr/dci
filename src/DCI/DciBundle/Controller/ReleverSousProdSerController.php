<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\ReleverSousProdSer;
use DCI\DciBundle\Entity\IndicaSousProdSer;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Releversousprodser controller.
 *
 */
class ReleverSousProdSerController extends Controller
{
    /**
     * Lists all releverSousProdSer entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $releverSousProdSers = $em->getRepository('DciBundle:ReleverSousProdSer')->findAll();

        return $this->render('form_dci/releversousprodser/index.html.twig', array(
            'releverSousProdSers' => $releverSousProdSers,
        ));
    }

    /**
     * Creates a new releverSousProdSer entity.
     *
     */
    public function newAction(IndicaSousProdSer $indicaSousProdSer, Request $request)
    {
        $releverSousProdSer = new ReleverSousProdSer();
        $form = $this->createForm('DCI\DciBundle\Form\ReleverSousProdSerType', $releverSousProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $releverSousProdSer->setIndicaSousProdSer($indicaSousProdSer);
            $em->persist($releverSousProdSer);
            $em->flush();

            return $this->redirectToRoute('releversousprodser_show', array('id' => $releverSousProdSer->getId()));
        }

        return $this->render('form_dci/releversousprodser/new.html.twig', array(
            'releverSousProdSer' => $releverSousProdSer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a releverSousProdSer entity.
     *
     */
    public function showAction(ReleverSousProdSer $releverSousProdSer)
    {
        $deleteForm = $this->createDeleteForm($releverSousProdSer);

        return $this->render('form_dci/releversousprodser/show.html.twig', array(
            'releverSousProdSer' => $releverSousProdSer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing releverSousProdSer entity.
     *
     */
    public function editAction(Request $request, ReleverSousProdSer $releverSousProdSer)
    {
        $deleteForm = $this->createDeleteForm($releverSousProdSer);
        $editForm = $this->createForm('DCI\DciBundle\Form\ReleverSousProdSerType', $releverSousProdSer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('releversousprodser_show', array('id' => $releverSousProdSer->getId()));
        }

        return $this->render('form_dci/releversousprodser/edit.html.twig', array(
            'releverSousProdSer' => $releverSousProdSer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a releverSousProdSer entity.
     *
     */
    public function deleteAction(Request $request, ReleverSousProdSer $releverSousProdSer)
    {
        $form = $this->createDeleteForm($releverSousProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($releverSousProdSer);
            $em->flush();
        }

        return $this->redirectToRoute('releversousprodser_index');
    }

    /**
     * Creates a form to delete a releverSousProdSer entity.
     *
     * @param ReleverSousProdSer $releverSousProdSer The releverSousProdSer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReleverSousProdSer $releverSousProdSer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('releversousprodser_delete', array('id' => $releverSousProdSer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
