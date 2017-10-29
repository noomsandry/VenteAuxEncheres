<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ResultatAnal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Resultatanal controller.
 *
 * @Route("resultatanal")
 */
class ResultatAnalController extends Controller
{
    /**
     * Lists all resultatAnal entities.
     *
     * @Route("/", name="resultatanal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $resultatAnals = $em->getRepository('AppBundle:ResultatAnal')->findAll();

        return $this->render('resultatanal/index.html.twig', array(
            'resultatAnals' => $resultatAnals,
        ));
    }

    /**
     * Creates a new resultatAnal entity.
     *
     * @Route("/new", name="resultatanal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $resultatAnal = new Resultatanal();
        $form = $this->createForm('AppBundle\Form\ResultatAnalType', $resultatAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($resultatAnal);
            $em->flush();

            return $this->redirectToRoute('resultatanal_show', array('numresultatanal' => $resultatAnal->getNumresultatanal()));
        }

        return $this->render('resultatanal/new.html.twig', array(
            'resultatAnal' => $resultatAnal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a resultatAnal entity.
     *
     * @Route("/{numresultatanal}", name="resultatanal_show")
     * @Method("GET")
     */
    public function showAction(ResultatAnal $resultatAnal)
    {
        $deleteForm = $this->createDeleteForm($resultatAnal);

        return $this->render('resultatanal/show.html.twig', array(
            'resultatAnal' => $resultatAnal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing resultatAnal entity.
     *
     * @Route("/{numresultatanal}/edit", name="resultatanal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ResultatAnal $resultatAnal)
    {
        $deleteForm = $this->createDeleteForm($resultatAnal);
        $editForm = $this->createForm('AppBundle\Form\ResultatAnalType', $resultatAnal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('resultatanal_edit', array('numresultatanal' => $resultatAnal->getNumresultatanal()));
        }

        return $this->render('resultatanal/edit.html.twig', array(
            'resultatAnal' => $resultatAnal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a resultatAnal entity.
     *
     * @Route("/{numresultatanal}", name="resultatanal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ResultatAnal $resultatAnal)
    {
        $form = $this->createDeleteForm($resultatAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($resultatAnal);
            $em->flush();
        }

        return $this->redirectToRoute('resultatanal_index');
    }

    /**
     * Creates a form to delete a resultatAnal entity.
     *
     * @param ResultatAnal $resultatAnal The resultatAnal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ResultatAnal $resultatAnal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('resultatanal_delete', array('numresultatanal' => $resultatAnal->getNumresultatanal())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
