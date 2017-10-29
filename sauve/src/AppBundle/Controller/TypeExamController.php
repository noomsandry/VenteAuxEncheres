<?php

namespace AppBundle\Controller;

use AppBundle\Entity\TypeExam;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Typeexam controller.
 *
 * @Route("typeexam")
 */
class TypeExamController extends Controller
{
    /**
     * Lists all typeExam entities.
     *
     * @Route("/", name="typeexam_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $typeExams = $em->getRepository('AppBundle:TypeExam')->findAll();

        return $this->render('typeexam/index.html.twig', array(
            'typeExams' => $typeExams,
        ));
    }

    /**
     * Creates a new typeExam entity.
     *
     * @Route("/new", name="typeexam_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $typeExam = new Typeexam();
        $form = $this->createForm('AppBundle\Form\TypeExamType', $typeExam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($typeExam);
            $em->flush();

            return $this->redirectToRoute('typeexam_show', array('numtypeexam' => $typeExam->getNumtypeexam()));
        }

        return $this->render('typeexam/new.html.twig', array(
            'typeExam' => $typeExam,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a typeExam entity.
     *
     * @Route("/{numtypeexam}", name="typeexam_show")
     * @Method("GET")
     */
    public function showAction(TypeExam $typeExam)
    {
        $deleteForm = $this->createDeleteForm($typeExam);

        return $this->render('typeexam/show.html.twig', array(
            'typeExam' => $typeExam,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing typeExam entity.
     *
     * @Route("/{numtypeexam}/edit", name="typeexam_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, TypeExam $typeExam)
    {
        $deleteForm = $this->createDeleteForm($typeExam);
        $editForm = $this->createForm('AppBundle\Form\TypeExamType', $typeExam);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('typeexam_edit', array('numtypeexam' => $typeExam->getNumtypeexam()));
        }

        return $this->render('typeexam/edit.html.twig', array(
            'typeExam' => $typeExam,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a typeExam entity.
     *
     * @Route("/{numtypeexam}", name="typeexam_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, TypeExam $typeExam)
    {
        $form = $this->createDeleteForm($typeExam);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($typeExam);
            $em->flush();
        }

        return $this->redirectToRoute('typeexam_index');
    }

    /**
     * Creates a form to delete a typeExam entity.
     *
     * @param TypeExam $typeExam The typeExam entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(TypeExam $typeExam)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('typeexam_delete', array('numtypeexam' => $typeExam->getNumtypeexam())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
