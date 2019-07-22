<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\IndicaSousProdSer;
use DCI\DciBundle\Entity\SousCategorieEntite;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Indicasousprodser controller.
 *
 */
class IndicaSousProdSerController extends Controller
{
    /**
     * Lists all indicaSousProdSer entities.
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

        $indicaSousProdSers = $em->getRepository('DciBundle:IndicaSousProdSer')->allIndicaSousProdSer($page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicaSousProdSers) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicasousprodser/index.html.twig', array(
            'indicaSousProdSers' => $indicaSousProdSers,
            'page' => $page,
            'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    public function indicatD1SousCategAction($id, $page)
    {
            if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $indicaSousProdSers = $em->getRepository('DciBundle:IndicaSousProdSer')->allIndicatD1SousCateg($id, $page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicaSousProdSers) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicasousprodser/index.html.twig', array(
            'indicaSousProdSers' => $indicaSousProdSers,
            'page' => $page,
            'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new indicaSousProdSer entity.
     *
     */
    public function newAction(Request $request)
    {
        $indicaSousProdSer = new Indicasousprodser();
        $form = $this->createForm('DCI\DciBundle\Form\IndicaSousProdSerType', $indicaSousProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($indicaSousProdSer);
            $em->flush();

            return $this->redirectToRoute('indicasousprodser_show', array('id' => $indicaSousProdSer->getId()));
        }

        return $this->render('form_dci/indicasousprodser/new.html.twig', array(
            'indicaSousProdSer' => $indicaSousProdSer,
            'form' => $form->createView(),
        ));
    }
    public function addIndicaSousProdSerAction(Request $request, SousCategorieEntite $sousCategorieEntite)
    {
        $indicaSousProdSer = new IndicaSousProdSer();
        $form = $this->createForm('DCI\DciBundle\Form\AddIndicaSousProdSerType', $indicaSousProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $indicaSousProdSer->setSousCateEntite($sousCategorieEntite);
            $em->persist($indicaSousProdSer);
            $em->flush();

            return $this->redirectToRoute('arborescence_index');
        }

        return $this->render('form_dci/indicasousprodser/new.html.twig', array(
            'indicaSousProdSer' => $indicaSousProdSer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a indicaSousProdSer entity.
     *
     */
    public function showAction(IndicaSousProdSer $indicaSousProdSer)
    {
        $deleteForm = $this->createDeleteForm($indicaSousProdSer);

        return $this->render('form_dci/indicasousprodser/show.html.twig', array(
            'indicaSousProdSer' => $indicaSousProdSer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing indicaSousProdSer entity.
     *
     */
    public function editAction(Request $request, IndicaSousProdSer $indicaSousProdSer)
    {
        $deleteForm = $this->createDeleteForm($indicaSousProdSer);
        $editForm = $this->createForm('DCI\DciBundle\Form\IndicaSousProdSerType', $indicaSousProdSer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('indicasousprodser_edit', array('id' => $indicaSousProdSer->getId()));
        }

        return $this->render('form_dci/indicasousprodser/edit.html.twig', array(
            'indicaSousProdSer' => $indicaSousProdSer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a indicaSousProdSer entity.
     *
     */
    public function deleteAction(Request $request, IndicaSousProdSer $indicaSousProdSer)
    {
        $form = $this->createDeleteForm($indicaSousProdSer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($indicaSousProdSer);
            $em->flush();
        }

        return $this->redirectToRoute('indicasousprodser_index');
    }

    /**
     * Creates a form to delete a indicaSousProdSer entity.
     *
     * @param IndicaSousProdSer $indicaSousProdSer The indicaSousProdSer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IndicaSousProdSer $indicaSousProdSer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('indicasousprodser_delete', array('id' => $indicaSousProdSer->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
