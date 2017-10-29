<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Etablissement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Etablissement controller.
 *
 * @Route("etablissement")
 */
class EtablissementController extends Controller
{
    /**
     * Lists all etablissement entities.
     *
     * @Route("/", name="etablissement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $etablissements = $em->getRepository('AppBundle:Etablissement')->findAll();

        return $this->render('etablissement/index.html.twig', array(
            'etablissements' => $etablissements,
        ));
    }

    /**
     * Creates a new etablissement entity.
     *
     * @Route("/new", name="etablissement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $etablissement = new Etablissement();
        $form = $this->createForm('AppBundle\Form\EtablissementType', $etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($etablissement);
            $em->flush();

            return $this->redirectToRoute('etablissement_show', array('numetab' => $etablissement->getNumetab()));
        }

        return $this->render('etablissement/new.html.twig', array(
            'etablissement' => $etablissement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a etablissement entity.
     *
     * @Route("/{numetab}", name="etablissement_show")
     * @Method("GET")
     */
    public function showAction(Etablissement $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);

        return $this->render('etablissement/show.html.twig', array(
            'etablissement' => $etablissement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing etablissement entity.
     *
     * @Route("/{numetab}/edit", name="etablissement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Etablissement $etablissement)
    {
        $deleteForm = $this->createDeleteForm($etablissement);
        $editForm = $this->createForm('AppBundle\Form\EtablissementType', $etablissement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('etablissement_edit', array('numetab' => $etablissement->getNumetab()));
        }

        return $this->render('etablissement/edit.html.twig', array(
            'etablissement' => $etablissement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a etablissement entity.
     *
     * @Route("/{numetab}", name="etablissement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Etablissement $etablissement)
    {
        $form = $this->createDeleteForm($etablissement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($etablissement);
            $em->flush();
        }

        return $this->redirectToRoute('etablissement_index');
    }

    /**
     * Creates a form to delete a etablissement entity.
     *
     * @param Etablissement $etablissement The etablissement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Etablissement $etablissement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('etablissement_delete', array('numetab' => $etablissement->getNumetab())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
