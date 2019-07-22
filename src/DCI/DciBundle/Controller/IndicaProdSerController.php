<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\IndicaProdSer;
use DCI\DciBundle\Entity\CategorieEntite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
//use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * Indicaprodser controller.
 *
 */
class IndicaProdSerController extends Controller
{
    /**
     * Lists all indicaProdSer entities.
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

        $indicaProdSers = $em->getRepository('DciBundle:IndicaProdSer')->allIndicaProdSer($page, $nbrAttPage);
        $nbrTotalPages = ceil(count($indicaProdSers) / $nbrAttPage);
         // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicaprodser/index.html.twig', array(
            'indicaProdSers' => $indicaProdSers,
             'page' => $page,
             'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    public function indicatD1ProdSerAction($id, $page)
    {
          if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
          //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $indicaProdSers = $em->getRepository('DciBundle:IndicaProdSer')->indicatD1ProdSer($id, $page, $nbrAttPage);
        $nbrTotalPages = ceil(count($indicaProdSers) / $nbrAttPage);
         // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page " . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicaprodser/index.html.twig', array(
            'indicaProdSers' => $indicaProdSers,
             'page' => $page,
             'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new indicaProdSer entity.
     *
     */
    public function newAction(Request $request)
    {
        $indicaProdSer = new Indicaprodser();
        $form = $this->createForm('DCI\DciBundle\Form\IndicaProdSerType', $indicaProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($indicaProdSer);
            $em->flush();

            return $this->redirectToRoute('indicaprodser_show', array('id' => $indicaProdSer->getId()));
        }

        return $this->render('form_dci/indicaprodser/new.html.twig', array(
            'indicaProdSer' => $indicaProdSer,
            'form' => $form->createView(),
        ));
    }
    public function addIndicaProdSerAction(Request $request, CategorieEntite $categorieEntite)
    {
        $indicaProdSer = new IndicaProdSer();
        $form = $this->createForm('DCI\DciBundle\Form\AddIndicaProdSerType', $indicaProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $indicaProdSer->setCategorieEntite($categorieEntite);
            $em->persist($indicaProdSer);
            $em->flush();

            return $this->redirectToRoute('arborescence_index');
        }

        return $this->render('form_dci/indicaprodser/new.html.twig', array(
            'indicaProdSer' => $indicaProdSer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a indicaProdSer entity.
     *
     */
    public function showAction(IndicaProdSer $indicaProdSer)
    {
        $deleteForm = $this->createDeleteForm($indicaProdSer);

        return $this->render('form_dci/indicaprodser/show.html.twig', array(
            'indicaProdSer' => $indicaProdSer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing indicaProdSer entity.
     *
     */
    public function editAction(Request $request, IndicaProdSer $indicaProdSer)
    {
        $deleteForm = $this->createDeleteForm($indicaProdSer);
        $editForm = $this->createForm('DCI\DciBundle\Form\IndicaProdSerType', $indicaProdSer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('indicaprodser_show', array('id' => $indicaProdSer->getId()));
        }

        return $this->render('form_dci/indicaprodser/edit.html.twig', array(
            'indicaProdSer' => $indicaProdSer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a indicaProdSer entity.
     *
     */
    public function deleteAction(Request $request, IndicaProdSer $indicaProdSer)
    {
        $form = $this->createDeleteForm($indicaProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($indicaProdSer);
            $em->flush();
        }

        return $this->redirectToRoute('indicaprodser_index');
    }

    /**
     * Creates a form to delete a indicaProdSer entity.
     *
     * @param IndicaProdSer $indicaProdSer The indicaProdSer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IndicaProdSer $indicaProdSer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('indicaprodser_delete', array('id' => $indicaProdSer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
