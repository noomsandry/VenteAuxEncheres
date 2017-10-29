<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Reactif;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Reactif controller.
 *
 * @Route("reactif")
 */
class ReactifController extends Controller
{
    /**
     * Lists all reactif entities.
     *
     * @Route("/", name="reactif_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reactifs = $em->getRepository('AppBundle:Reactif')->findAll();

        return $this->render('reactif/index.html.twig', array(
            'reactifs' => $reactifs,
        ));
    }

    /**
     * Creates a new reactif entity.
     *
     * @Route("/new", name="reactif_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $reactif = new Reactif();
        $form = $this->createForm('AppBundle\Form\ReactifType', $reactif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reactif);
            $em->flush();

            return $this->redirectToRoute('reactif_show', array('numreact' => $reactif->getNumreact()));
        }

        return $this->render('reactif/new.html.twig', array(
            'reactif' => $reactif,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reactif entity.
     *
     * @Route("/{numreact}", name="reactif_show")
     * @Method("GET")
     */
    public function showAction(Reactif $reactif)
    {
        $deleteForm = $this->createDeleteForm($reactif);

        return $this->render('reactif/show.html.twig', array(
            'reactif' => $reactif,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reactif entity.
     *
     * @Route("/{numreact}/edit", name="reactif_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Reactif $reactif)
    {
        $deleteForm = $this->createDeleteForm($reactif);
        $editForm = $this->createForm('AppBundle\Form\ReactifType', $reactif);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reactif_edit', array('numreact' => $reactif->getNumreact()));
        }

        return $this->render('reactif/edit.html.twig', array(
            'reactif' => $reactif,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reactif entity.
     *
     * @Route("/{numreact}", name="reactif_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Reactif $reactif)
    {
        $form = $this->createDeleteForm($reactif);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reactif);
            $em->flush();
        }

        return $this->redirectToRoute('reactif_index');
    }

    /**
     * Creates a form to delete a reactif entity.
     *
     * @param Reactif $reactif The reactif entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reactif $reactif)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reactif_delete', array('numreact' => $reactif->getNumreact())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
