<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CategAnal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Categanal controller.
 *
 * @Route("categanal")
 */
class CategAnalController extends Controller
{
    /**
     * Lists all categAnal entities.
     *
     * @Route("/", name="categanal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categAnals = $em->getRepository('AppBundle:CategAnal')->findAll();

        return $this->render('categanal/index.html.twig', array(
            'categAnals' => $categAnals,
        ));
    }

    /**
     * Creates a new categAnal entity.
     *
     * @Route("/new", name="categanal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categAnal = new Categanal();
        $form = $this->createForm('AppBundle\Form\CategAnalType', $categAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categAnal);
            $em->flush();

            return $this->redirectToRoute('categanal_show', array('numcateganal' => $categAnal->getNumcateganal()));
        }

        return $this->render('categanal/new.html.twig', array(
            'categAnal' => $categAnal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categAnal entity.
     *
     * @Route("/{numcateganal}", name="categanal_show")
     * @Method("GET")
     */
    public function showAction(CategAnal $categAnal)
    {
        $deleteForm = $this->createDeleteForm($categAnal);

        return $this->render('categanal/show.html.twig', array(
            'categAnal' => $categAnal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categAnal entity.
     *
     * @Route("/{numcateganal}/edit", name="categanal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CategAnal $categAnal)
    {
        $deleteForm = $this->createDeleteForm($categAnal);
        $editForm = $this->createForm('AppBundle\Form\CategAnalType', $categAnal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categanal_edit', array('numcateganal' => $categAnal->getNumcateganal()));
        }

        return $this->render('categanal/edit.html.twig', array(
            'categAnal' => $categAnal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categAnal entity.
     *
     * @Route("/{numcateganal}", name="categanal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CategAnal $categAnal)
    {
        $form = $this->createDeleteForm($categAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categAnal);
            $em->flush();
        }

        return $this->redirectToRoute('categanal_index');
    }

    /**
     * Creates a form to delete a categAnal entity.
     *
     * @param CategAnal $categAnal The categAnal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategAnal $categAnal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categanal_delete', array('numcateganal' => $categAnal->getNumcateganal())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
