<?php

namespace AppBundle\Controller;

use AppBundle\Entity\PersAnalCal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Persanalcal controller.
 *
 * @Route("persanalcal")
 */
class PersAnalCalController extends Controller
{
    /**
     * Lists all persAnalCal entities.
     *
     * @Route("/", name="persanalcal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $persAnalCals = $em->getRepository('AppBundle:PersAnalCal')->findAll();

        return $this->render('persanalcal/index.html.twig', array(
            'persAnalCals' => $persAnalCals,
        ));
    }

    /**
     * Creates a new persAnalCal entity.
     *
     * @Route("/new", name="persanalcal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $persAnalCal = new Persanalcal();
        $form = $this->createForm('AppBundle\Form\PersAnalCalType', $persAnalCal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($persAnalCal);
            $em->flush();

            return $this->redirectToRoute('persanalcal_show', array('datepat' => $persAnalCal->getDatepat()));
        }

        return $this->render('persanalcal/new.html.twig', array(
            'persAnalCal' => $persAnalCal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a persAnalCal entity.
     *
     * @Route("/{datepat}", name="persanalcal_show")
     * @Method("GET")
     */
    public function showAction(PersAnalCal $persAnalCal)
    {
        $deleteForm = $this->createDeleteForm($persAnalCal);

        return $this->render('persanalcal/show.html.twig', array(
            'persAnalCal' => $persAnalCal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing persAnalCal entity.
     *
     * @Route("/{datepat}/edit", name="persanalcal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, PersAnalCal $persAnalCal)
    {
        $deleteForm = $this->createDeleteForm($persAnalCal);
        $editForm = $this->createForm('AppBundle\Form\PersAnalCalType', $persAnalCal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('persanalcal_edit', array('datepat' => $persAnalCal->getDatepat()));
        }

        return $this->render('persanalcal/edit.html.twig', array(
            'persAnalCal' => $persAnalCal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a persAnalCal entity.
     *
     * @Route("/{datepat}", name="persanalcal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, PersAnalCal $persAnalCal)
    {
        $form = $this->createDeleteForm($persAnalCal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($persAnalCal);
            $em->flush();
        }

        return $this->redirectToRoute('persanalcal_index');
    }

    /**
     * Creates a form to delete a persAnalCal entity.
     *
     * @param PersAnalCal $persAnalCal The persAnalCal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(PersAnalCal $persAnalCal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('persanalcal_delete', array('datepat' => $persAnalCal->getDatepat())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
