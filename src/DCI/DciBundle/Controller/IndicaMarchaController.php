<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\IndicaMarcha;
use DCI\DciBundle\Entity\Marchandise;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Indicamarcha controller.
 *
 */
class IndicaMarchaController extends Controller {

    /**
     * Lists all indicaMarcha entities.
     *
     */
    public function indexAction($page) {
          if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $indicaMarchas = $em->getRepository('DciBundle:IndicaMarcha')->allIndicaMarcha($page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicaMarchas) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicamarcha/index.html.twig', array(
                    'indicaMarchas' => $indicaMarchas,
                     'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }
    
    /**
     * Affiche des indicateurs d'une seule marchandise
     * 
     * @param type $id
     * @param type $page
     * @return type
     * @throws NotFoundHttpException
     * @throws type
     */
    public function indicatD1MarchaAction($id, $page) {
          if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }
        
         //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $indicaMarchas = $em->getRepository('DciBundle:IndicaMarcha')->indicatD1Marcha($id, $page, $nbrAttPage);
        
         // On calcule le nombre total de pages grâce au count($attestations) qui retourne
         //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicaMarchas) / $nbrAttPage);
        
        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicamarcha/index.html.twig', array(
                    'indicaMarchas' => $indicaMarchas,
                     'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new indicaMarcha entity.
     *
     */
    public function newAction(Request $request) {
        $indicaMarcha = new Indicamarcha();
        $form = $this->createForm('DCI\DciBundle\Form\IndicaMarchaType', $indicaMarcha);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($indicaMarcha);
            $em->flush();

            return $this->redirectToRoute('indicamarcha_show', array('id' => $indicaMarcha->getId()));
        }

        return $this->render('form_dci/indicamarcha/new.html.twig', array(
                    'indicaMarcha' => $indicaMarcha,
                    'form' => $form->createView(),
        ));
    }
    
    /**
     * Creer un indicateur de marchandise direcement
     *
     */
    public function addIndicaMarchaAction(Request $request, Marchandise $marchandise) {
        $indicaMarcha = new IndicaMarcha();
        $form = $this->createForm('DCI\DciBundle\Form\AddIndicaMarchaType', $indicaMarcha);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $indicaMarcha->setMarchandise($marchandise);
            $em->persist($indicaMarcha);
            $em->flush();

            return $this->redirectToRoute('indicamarcha_show', array('id' => $indicaMarcha->getId()));
        }

        return $this->render('form_dci/indicamarcha/new.html.twig', array(
                    'indicaMarcha' => $indicaMarcha,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a indicaMarcha entity.
     *
     */
    public function showAction(IndicaMarcha $indicaMarcha) {
        $deleteForm = $this->createDeleteForm($indicaMarcha);

        return $this->render('form_dci/indicamarcha/show.html.twig', array(
                    'indicaMarcha' => $indicaMarcha,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing indicaMarcha entity.
     *
     */
    public function editAction(Request $request, IndicaMarcha $indicaMarcha) {
        $deleteForm = $this->createDeleteForm($indicaMarcha);
        $editForm = $this->createForm('DCI\DciBundle\Form\IndicaMarchaType', $indicaMarcha);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('indicamarcha_edit', array('id' => $indicaMarcha->getId()));
        }

        return $this->render('form_dci/indicamarcha/edit.html.twig', array(
                    'indicaMarcha' => $indicaMarcha,
                    'edit_form' => $editForm->createView(),
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a indicaMarcha entity.
     *
     */
    public function deleteAction(Request $request, IndicaMarcha $indicaMarcha) {
        $form = $this->createDeleteForm($indicaMarcha);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($indicaMarcha);
            $em->flush();
        }

        return $this->redirectToRoute('indicamarcha_index');
    }

    /**
     * Creates a form to delete a indicaMarcha entity.
     *
     * @param IndicaMarcha $indicaMarcha The indicaMarcha entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(IndicaMarcha $indicaMarcha) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('indicamarcha_delete', array('id' => $indicaMarcha->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
