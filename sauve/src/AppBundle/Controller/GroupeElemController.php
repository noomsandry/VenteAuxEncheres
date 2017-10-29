<?php

namespace AppBundle\Controller;

use AppBundle\Entity\GroupeElem;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Groupeelem controller.
 *
 * @Route("groupeelem")
 */
class GroupeElemController extends Controller
{
    /**
     * Lists all groupeElem entities.
     *
     * @Route("/", name="groupeelem_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $groupeElems = $em->getRepository('AppBundle:GroupeElem')->findAll();

        return $this->render('groupeelem/index.html.twig', array(
            'groupeElems' => $groupeElems,
        ));
    }

    /**
     * Creates a new groupeElem entity.
     *
     * @Route("/new", name="groupeelem_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $groupeElem = new Groupeelem();
        $form = $this->createForm('AppBundle\Form\GroupeElemType', $groupeElem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($groupeElem);
            $em->flush();

            return $this->redirectToRoute('groupeelem_show', array('numgroupeelem' => $groupeElem->getNumgroupeelem()));
        }

        return $this->render('groupeelem/new.html.twig', array(
            'groupeElem' => $groupeElem,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a groupeElem entity.
     *
     * @Route("/{numgroupeelem}", name="groupeelem_show")
     * @Method("GET")
     */
    public function showAction(GroupeElem $groupeElem)
    {
        $deleteForm = $this->createDeleteForm($groupeElem);

        return $this->render('groupeelem/show.html.twig', array(
            'groupeElem' => $groupeElem,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing groupeElem entity.
     *
     * @Route("/{numgroupeelem}/edit", name="groupeelem_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, GroupeElem $groupeElem)
    {
        $deleteForm = $this->createDeleteForm($groupeElem);
        $editForm = $this->createForm('AppBundle\Form\GroupeElemType', $groupeElem);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('groupeelem_edit', array('numgroupeelem' => $groupeElem->getNumgroupeelem()));
        }

        return $this->render('groupeelem/edit.html.twig', array(
            'groupeElem' => $groupeElem,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a groupeElem entity.
     *
     * @Route("/{numgroupeelem}", name="groupeelem_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, GroupeElem $groupeElem)
    {
        $form = $this->createDeleteForm($groupeElem);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($groupeElem);
            $em->flush();
        }

        return $this->redirectToRoute('groupeelem_index');
    }

    /**
     * Creates a form to delete a groupeElem entity.
     *
     * @param GroupeElem $groupeElem The groupeElem entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(GroupeElem $groupeElem)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('groupeelem_delete', array('numgroupeelem' => $groupeElem->getNumgroupeelem())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
