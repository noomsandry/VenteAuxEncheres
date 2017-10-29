<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Ligneentree;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Ligneentree controller.
 *
 * @Route("ligneentree")
 */
class LigneentreeController extends Controller
{
    /**
     * Lists all ligneentree entities.
     *
     * @Route("/", name="ligneentree_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $ligneentrees = $em->getRepository('AppBundle:Ligneentree')->findAll();

        return $this->render('ligneentree/index.html.twig', array(
            'ligneentrees' => $ligneentrees,
        ));
    }

    /**
     * Creates a new ligneentree entity.
     *
     * @Route("/new", name="ligneentree_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $ligneentree = new Ligneentree();
        $form = $this->createForm('AppBundle\Form\LigneentreeType', $ligneentree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($ligneentree);
            $em->flush();

            return $this->redirectToRoute('ligneentree_show', array('numlingeentree' => $ligneentree->getNumlingeentree()));
        }

        return $this->render('ligneentree/new.html.twig', array(
            'ligneentree' => $ligneentree,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ligneentree entity.
     *
     * @Route("/{numlingeentree}", name="ligneentree_show")
     * @Method("GET")
     */
    public function showAction(Ligneentree $ligneentree)
    {
        $deleteForm = $this->createDeleteForm($ligneentree);

        return $this->render('ligneentree/show.html.twig', array(
            'ligneentree' => $ligneentree,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ligneentree entity.
     *
     * @Route("/{numlingeentree}/edit", name="ligneentree_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Ligneentree $ligneentree)
    {
        $deleteForm = $this->createDeleteForm($ligneentree);
        $editForm = $this->createForm('AppBundle\Form\LigneentreeType', $ligneentree);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('ligneentree_edit', array('numlingeentree' => $ligneentree->getNumlingeentree()));
        }

        return $this->render('ligneentree/edit.html.twig', array(
            'ligneentree' => $ligneentree,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a ligneentree entity.
     *
     * @Route("/{numlingeentree}", name="ligneentree_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Ligneentree $ligneentree)
    {
        $form = $this->createDeleteForm($ligneentree);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($ligneentree);
            $em->flush();
        }

        return $this->redirectToRoute('ligneentree_index');
    }

    /**
     * Creates a form to delete a ligneentree entity.
     *
     * @param Ligneentree $ligneentree The ligneentree entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Ligneentree $ligneentree)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('ligneentree_delete', array('numlingeentree' => $ligneentree->getNumlingeentree())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
