<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Patient;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Patient controller.
 *
 * @Route("patient")
 */
class PatientController extends Controller
{
    /**
     * Lists all patient entities.
     *
     * @Route("/", name="patient_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $patients = $em->getRepository('AppBundle:Patient')->findAll();

        return $this->render('patient/index.html.twig', array(
            'patients' => $patients,
        ));
    }

    /**
     * Creates a new patient entity.
     *
     * @Route("/new", name="patient_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $patient = new Patient();
        $form = $this->createForm('AppBundle\Form\PatientType', $patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($patient);
            $em->flush();

            return $this->redirectToRoute('patient_show', array('numpat' => $patient->getNumpat()));
        }

        return $this->render('patient/new.html.twig', array(
            'patient' => $patient,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a patient entity.
     *
     * @Route("/{numpat}", name="patient_show")
     * @Method("GET")
     */
    public function showAction(Patient $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);

        return $this->render('patient/show.html.twig', array(
            'patient' => $patient,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing patient entity.
     *
     * @Route("/{numpat}/edit", name="patient_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Patient $patient)
    {
        $deleteForm = $this->createDeleteForm($patient);
        $editForm = $this->createForm('AppBundle\Form\PatientType', $patient);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('patient_edit', array('numpat' => $patient->getNumpat()));
        }

        return $this->render('patient/edit.html.twig', array(
            'patient' => $patient,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a patient entity.
     *
     * @Route("/{numpat}", name="patient_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Patient $patient)
    {
        $form = $this->createDeleteForm($patient);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($patient);
            $em->flush();
        }

        return $this->redirectToRoute('patient_index');
    }

    /**
     * Creates a form to delete a patient entity.
     *
     * @param Patient $patient The patient entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Patient $patient)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('patient_delete', array('numpat' => $patient->getNumpat())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
