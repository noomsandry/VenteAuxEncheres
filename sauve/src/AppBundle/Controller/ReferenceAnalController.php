<?php

namespace AppBundle\Controller;

use AppBundle\Entity\ReferenceAnal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Referenceanal controller.
 *
 * @Route("referenceanal")
 */
class ReferenceAnalController extends Controller
{
    /**
     * Lists all referenceAnal entities.
     *
     * @Route("/", name="referenceanal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $referenceAnals = $em->getRepository('AppBundle:ReferenceAnal')->findAll();

        return $this->render('referenceanal/index.html.twig', array(
            'referenceAnals' => $referenceAnals,
        ));
    }

    /**
     * Creates a new referenceAnal entity.
     *
     * @Route("/new", name="referenceanal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $referenceAnal = new Referenceanal();
        $form = $this->createForm('AppBundle\Form\ReferenceAnalType', $referenceAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($referenceAnal);
            $em->flush();

            return $this->redirectToRoute('referenceanal_show', array('numrefanal' => $referenceAnal->getNumrefanal()));
        }

        return $this->render('referenceanal/new.html.twig', array(
            'referenceAnal' => $referenceAnal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a referenceAnal entity.
     *
     * @Route("/{numrefanal}", name="referenceanal_show")
     * @Method("GET")
     */
    public function showAction(ReferenceAnal $referenceAnal)
    {
        $deleteForm = $this->createDeleteForm($referenceAnal);

        return $this->render('referenceanal/show.html.twig', array(
            'referenceAnal' => $referenceAnal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing referenceAnal entity.
     *
     * @Route("/{numrefanal}/edit", name="referenceanal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, ReferenceAnal $referenceAnal)
    {
        $deleteForm = $this->createDeleteForm($referenceAnal);
        $editForm = $this->createForm('AppBundle\Form\ReferenceAnalType', $referenceAnal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('referenceanal_edit', array('numrefanal' => $referenceAnal->getNumrefanal()));
        }

        return $this->render('referenceanal/edit.html.twig', array(
            'referenceAnal' => $referenceAnal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a referenceAnal entity.
     *
     * @Route("/{numrefanal}", name="referenceanal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, ReferenceAnal $referenceAnal)
    {
        $form = $this->createDeleteForm($referenceAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($referenceAnal);
            $em->flush();
        }

        return $this->redirectToRoute('referenceanal_index');
    }

    /**
     * Creates a form to delete a referenceAnal entity.
     *
     * @param ReferenceAnal $referenceAnal The referenceAnal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(ReferenceAnal $referenceAnal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('referenceanal_delete', array('numrefanal' => $referenceAnal->getNumrefanal())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
