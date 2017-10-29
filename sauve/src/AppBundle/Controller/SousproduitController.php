<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Sousproduit;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Sousproduit controller.
 *
 * @Route("sousproduit")
 */
class SousproduitController extends Controller
{
    /**
     * Lists all sousproduit entities.
     *
     * @Route("/", name="sousproduit_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $sousproduits = $em->getRepository('AppBundle:Sousproduit')->findAll();

        return $this->render('sousproduit/index.html.twig', array(
            'sousproduits' => $sousproduits,
        ));
    }

    /**
     * Creates a new sousproduit entity.
     *
     * @Route("/new", name="sousproduit_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $sousproduit = new Sousproduit();
        $form = $this->createForm('AppBundle\Form\SousproduitType', $sousproduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($sousproduit);
            $em->flush();

            return $this->redirectToRoute('sousproduit_show', array('numsousprod' => $sousproduit->getNumsousprod()));
        }

        return $this->render('sousproduit/new.html.twig', array(
            'sousproduit' => $sousproduit,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a sousproduit entity.
     *
     * @Route("/{numsousprod}", name="sousproduit_show")
     * @Method("GET")
     */
    public function showAction(Sousproduit $sousproduit)
    {
        $deleteForm = $this->createDeleteForm($sousproduit);

        return $this->render('sousproduit/show.html.twig', array(
            'sousproduit' => $sousproduit,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing sousproduit entity.
     *
     * @Route("/{numsousprod}/edit", name="sousproduit_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Sousproduit $sousproduit)
    {
        $deleteForm = $this->createDeleteForm($sousproduit);
        $editForm = $this->createForm('AppBundle\Form\SousproduitType', $sousproduit);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('sousproduit_edit', array('numsousprod' => $sousproduit->getNumsousprod()));
        }

        return $this->render('sousproduit/edit.html.twig', array(
            'sousproduit' => $sousproduit,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a sousproduit entity.
     *
     * @Route("/{numsousprod}", name="sousproduit_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Sousproduit $sousproduit)
    {
        $form = $this->createDeleteForm($sousproduit);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($sousproduit);
            $em->flush();
        }

        return $this->redirectToRoute('sousproduit_index');
    }

    /**
     * Creates a form to delete a sousproduit entity.
     *
     * @param Sousproduit $sousproduit The sousproduit entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Sousproduit $sousproduit)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('sousproduit_delete', array('numsousprod' => $sousproduit->getNumsousprod())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
