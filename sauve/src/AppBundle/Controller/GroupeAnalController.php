<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GroupeAnal;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Groupeanal controller.
 *
 * @Route("groupeanal")
 */
class GroupeAnalController extends Controller
{
    /**
     * Lists all groupeAnal entities.
     *
     * @Route("/", name="groupeanal_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupeAnals = $em->getRepository('AppBundle:GroupeAnal')->findAll();

        return $this->render('groupeanal/index.html.twig', array(
            'groupeAnals' => $groupeAnals,
        ));
    }

    /**
     * Creates a new groupeAnal entity.
     *
     * @Route("/new", name="groupeanal_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupeAnal = new Groupeanal();
        $form = $this->createForm('AppBundle\Form\GroupeAnalType', $groupeAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupeAnal);
            $em->flush();

            return $this->redirectToRoute('groupeanal_show', array('numgroupeanal' => $groupeAnal->getNumgroupeanal()));
        }

        return $this->render('groupeanal/new.html.twig', array(
            'groupeAnal' => $groupeAnal,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupeAnal entity.
     *
     * @Route("/{numgroupeanal}", name="groupeanal_show")
     * @Method("GET")
     */
    public function showAction(GroupeAnal $groupeAnal)
    {
        $deleteForm = $this->createDeleteForm($groupeAnal);

        return $this->render('groupeanal/show.html.twig', array(
            'groupeAnal' => $groupeAnal,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupeAnal entity.
     *
     * @Route("/{numgroupeanal}/edit", name="groupeanal_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GroupeAnal $groupeAnal)
    {
        $deleteForm = $this->createDeleteForm($groupeAnal);
        $editForm = $this->createForm('AppBundle\Form\GroupeAnalType', $groupeAnal);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupeanal_edit', array('numgroupeanal' => $groupeAnal->getNumgroupeanal()));
        }

        return $this->render('groupeanal/edit.html.twig', array(
            'groupeAnal' => $groupeAnal,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupeAnal entity.
     *
     * @Route("/{numgroupeanal}", name="groupeanal_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GroupeAnal $groupeAnal)
    {
        $form = $this->createDeleteForm($groupeAnal);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupeAnal);
            $em->flush();
        }

        return $this->redirectToRoute('groupeanal_index');
    }

    /**
     * Creates a form to delete a groupeAnal entity.
     *
     * @param GroupeAnal $groupeAnal The groupeAnal entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupeAnal $groupeAnal)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupeanal_delete', array('numgroupeanal' => $groupeAnal->getNumgroupeanal())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
