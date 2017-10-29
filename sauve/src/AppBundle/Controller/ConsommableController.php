<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Consommable;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Consommable controller.
 *
 * @Route("consommable")
 */
class ConsommableController extends Controller
{
    /**
     * Lists all consommable entities.
     *
     * @Route("/", name="consommable_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $consommables = $em->getRepository('AppBundle:Consommable')->findAll();

        return $this->render('consommable/index.html.twig', array(
            'consommables' => $consommables,
        ));
    }

    /**
     * Creates a new consommable entity.
     *
     * @Route("/new", name="consommable_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $consommable = new Consommable();
        $form = $this->createForm('AppBundle\Form\ConsommableType', $consommable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($consommable);
            $em->flush();

            return $this->redirectToRoute('consommable_show', array('numconso' => $consommable->getNumconso()));
        }

        return $this->render('consommable/new.html.twig', array(
            'consommable' => $consommable,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a consommable entity.
     *
     * @Route("/{numconso}", name="consommable_show")
     * @Method("GET")
     */
    public function showAction(Consommable $consommable)
    {
        $deleteForm = $this->createDeleteForm($consommable);

        return $this->render('consommable/show.html.twig', array(
            'consommable' => $consommable,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing consommable entity.
     *
     * @Route("/{numconso}/edit", name="consommable_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Consommable $consommable)
    {
        $deleteForm = $this->createDeleteForm($consommable);
        $editForm = $this->createForm('AppBundle\Form\ConsommableType', $consommable);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('consommable_edit', array('numconso' => $consommable->getNumconso()));
        }

        return $this->render('consommable/edit.html.twig', array(
            'consommable' => $consommable,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a consommable entity.
     *
     * @Route("/{numconso}", name="consommable_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Consommable $consommable)
    {
        $form = $this->createDeleteForm($consommable);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($consommable);
            $em->flush();
        }

        return $this->redirectToRoute('consommable_index');
    }

    /**
     * Creates a form to delete a consommable entity.
     *
     * @param Consommable $consommable The consommable entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Consommable $consommable)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('consommable_delete', array('numconso' => $consommable->getNumconso())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
