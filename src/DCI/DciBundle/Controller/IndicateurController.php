<?php

namespace DCI\DciBundle\Controller;

use DCI\DciBundle\Entity\Indicateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

/**
 * Indicateur controller.
 *
 */
class IndicateurController extends Controller {

    /**
     * Lists all indicateur entities.
     *
     */
    public function indexAction($page) {

        if ($page < 1) {
            throw new NotFoundHttpException('Page "' . $page . '" inexistante.');
        }

        //je fixe je nombre d'annoce par page
        $nbrAttPage = 5;
        $em = $this->getDoctrine()->getManager();

        $indicateurs = $em->getRepository('DciBundle:Indicateur')->allIndicateur($page, $nbrAttPage);

        // On calcule le nombre total de pages grâce au count($attestations) qui retourne
        //  le nombre total d'annonces
        $nbrTotalPages = ceil(count($indicateurs) / $nbrAttPage);

        // Si la page n'existe pas, on retourne une 404
        if ($page > $nbrTotalPages) {
            throw $this->createNotFoundException("La page" . $page . " n'existe pas.");
        }

        return $this->render('form_dci/indicateur/index.html.twig', array(
                    'indicateurs' => $indicateurs,
                    'page' => $page,
                    'nbrTotalPages' => $nbrTotalPages,
        ));
    }

    /**
     * Creates a new indicateur entity.
     *
     */
    public function newAction(Request $request) {
        $indicateur = new Indicateur();

        if (isset($_POST['submit'])) {
            if (empty($_POST['categorie']) || empty($_POST['dateIndi']) || empty($_POST['libelle']) || empty($_POST['mode']) || empty($_POST['periodicite'])
                    || empty($_POST['niveau']) || empty($_POST['reference']) || empty($_POST['sousCategorie']) || empty($_POST['typeData']) 
                    || empty($_POST['typeIndicateur']) || empty($_POST['unite'])) {             
                    echo "<br/><br/><br/><font color='red'>Veuillez remplir tous les champs.</font><br/>";
                //link to the previous page
                echo "<br/><a href='javascript:self.history.back();'>Retour</a>";
            } else {
                // if all the fields are filled (not empty)             
                //insert data to database
                $indicateur->setCategorie($_POST['categorie']);
                $indicateur->setDateIndi($_POST['dateIndi']);
                $indicateur->setLibelle($_POST['libelle']);
                $indicateur->setMode($_POST['mode']);
                $indicateur->setPeriodicite($_POST['periodicite']);
                $indicateur->setNiveau($_POST['niveau']);
                $indicateur->setReference($_POST['reference']);
                $indicateur->setSousCategorie($_POST['sousCategorie']);
                $indicateur->setTypeData($_POST['typeData']);
                $indicateur->setTypeIndicateur($_POST['typeIndicateur']);
                $indicateur->setUnite($_POST['unite']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($indicateur);
                $em->flush();
                echo "<font color='green'>Data added successfully.";
                return $this->redirectToRoute('indicateur_show', array('id' => $indicateur->getId()));
            }
        }

        return $this->render('form_dci/indicateur/new.html.twig');
    }

    /**
     * Finds and displays a indicateur entity.
     *
     */
    public function showAction(Indicateur $indicateur) {
        $deleteForm = $this->createDeleteForm($indicateur);

        return $this->render('form_dci/indicateur/show.html.twig', array(
                    'indicateur' => $indicateur,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing indicateur entity.
     *
     */
    public function editAction(Request $request, Indicateur $indicateur) {
        $deleteForm = $this->createDeleteForm($indicateur);
        if (isset($_POST['submit'])) {
            if (empty($_POST['categorie']) || empty($_POST['dateIndi']) || empty($_POST['libelle']) || empty($_POST['mode']) || empty($_POST['periodicite'])
                    || empty($_POST['niveau']) || empty($_POST['reference']) || empty($_POST['sousCategorie']) || empty($_POST['typeData']) 
                    || empty($_POST['typeIndicateur']) || empty($_POST['unite'])) {             
                    echo "<br/><br/><br/><font color='red'>Veuillez remplir tous les champs.</font><br/>";
                //link to the previous page
                echo "<br/><a href='javascript:self.history.back();'>Retour</a>";
            } else {
                // if all the fields are filled (not empty)             
                //insert data to database
                $indicateur->setCategorie($_POST['categorie']);
                $indicateur->setDateIndi($_POST['dateIndi']);
                $indicateur->setLibelle($_POST['libelle']);
                $indicateur->setMode($_POST['mode']);
                $indicateur->setPeriodicite($_POST['periodicite']);
                $indicateur->setNiveau($_POST['niveau']);
                $indicateur->setReference($_POST['reference']);
                $indicateur->setSousCategorie($_POST['sousCategorie']);
                $indicateur->setTypeData($_POST['typeData']);
                $indicateur->setTypeIndicateur($_POST['typeIndicateur']);
                $indicateur->setUnite($_POST['unite']);

                $em = $this->getDoctrine()->getManager();
                $em->persist($indicateur);
                $em->flush();
                echo "<font color='green'>Data added successfully.";
                return $this->redirectToRoute('indicateur_edit', array('id' => $indicateur->getId()));
            }
        }   

        return $this->render('form_dci/indicateur/edit.html.twig', array(
                    'indicateur' => $indicateur,
                    'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a indicateur entity.
     *
     */
    public function deleteAction(Request $request, Indicateur $indicateur) {
        $form = $this->createDeleteForm($indicateur);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($indicateur);
            $em->flush();
        }

        return $this->redirectToRoute('indicateur_index');
    }

    /**
     * Creates a form to delete a indicateur entity.
     *
     * @param Indicateur $indicateur The indicateur entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Indicateur $indicateur) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('indicateur_delete', array('id' => $indicateur->getId())))
                        ->setMethod('DELETE')
                        ->getForm()
        ;
    }

}
