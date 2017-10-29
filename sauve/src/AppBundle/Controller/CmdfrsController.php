<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Cmdfrs;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Cmdfr controller.
 *
 * @Route("cmdfrs")
 */
class CmdfrsController extends Controller
{
    /**
     * Lists all cmdfr entities.
     *
     * @Route("/", name="cmdfrs_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $cmdfrs = $em->getRepository('AppBundle:Cmdfrs')->findAll();

        return $this->render('cmdfrs/index.html.twig', array(
            'cmdfrs' => $cmdfrs,
        ));
    }

    /**
     * Creates a new cmdfr entity.
     *
     * @Route("/new", name="cmdfrs_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $cmdfr = new Cmdfrs();
        $form = $this->createForm('AppBundle\Form\CmdfrsType', $cmdfr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($cmdfr);
            $em->flush();

            return $this->redirectToRoute('cmdfrs_show', array('numcmdfrs' => $cmdfr->getNumcmdfrs()));
        }

        return $this->render('cmdfrs/new.html.twig', array(
            'cmdfr' => $cmdfr,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a cmdfr entity.
     *
     * @Route("/{numcmdfrs}", name="cmdfrs_show")
     * @Method("GET")
     */
    public function showAction(Cmdfrs $cmdfr)
    {
        $deleteForm = $this->createDeleteForm($cmdfr);

        return $this->render('cmdfrs/show.html.twig', array(
            'cmdfr' => $cmdfr,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing cmdfr entity.
     *
     * @Route("/{numcmdfrs}/edit", name="cmdfrs_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Cmdfrs $cmdfr)
    {
        $deleteForm = $this->createDeleteForm($cmdfr);
        $editForm = $this->createForm('AppBundle\Form\CmdfrsType', $cmdfr);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('cmdfrs_edit', array('numcmdfrs' => $cmdfr->getNumcmdfrs()));
        }

        return $this->render('cmdfrs/edit.html.twig', array(
            'cmdfr' => $cmdfr,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a cmdfr entity.
     *
     * @Route("/{numcmdfrs}", name="cmdfrs_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Cmdfrs $cmdfr)
    {
        $form = $this->createDeleteForm($cmdfr);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($cmdfr);
            $em->flush();
        }

        return $this->redirectToRoute('cmdfrs_index');
    }

    /**
     * Creates a form to delete a cmdfr entity.
     *
     * @param Cmdfrs $cmdfr The cmdfr entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Cmdfrs $cmdfr)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('cmdfrs_delete', array('numcmdfrs' => $cmdfr->getNumcmdfrs())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
