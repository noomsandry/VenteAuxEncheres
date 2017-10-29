<?php

namespace AppBundle\Controller;

use AppBundle\Entity\CategoriePers;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Categorieper controller.
 *
 * @Route("categoriepers")
 */
class CategoriePersController extends Controller
{
    /**
     * Lists all categoriePer entities.
     *
     * @Route("/", name="categoriepers_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categoriePers = $em->getRepository('AppBundle:CategoriePers')->findAll();

        return $this->render('categoriepers/index.html.twig', array(
            'categoriePers' => $categoriePers,
        ));
    }

    /**
     * Creates a new categoriePer entity.
     *
     * @Route("/new", name="categoriepers_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $categoriePer = new Categorieper();
        $form = $this->createForm('AppBundle\Form\CategoriePersType', $categoriePer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categoriePer);
            $em->flush();

            return $this->redirectToRoute('categoriepers_show', array('numcategpers' => $categoriePer->getNumcategpers()));
        }

        return $this->render('categoriepers/new.html.twig', array(
            'categoriePer' => $categoriePer,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a categoriePer entity.
     *
     * @Route("/{numcategpers}", name="categoriepers_show")
     * @Method("GET")
     */
    public function showAction(CategoriePers $categoriePer)
    {
        $deleteForm = $this->createDeleteForm($categoriePer);

        return $this->render('categoriepers/show.html.twig', array(
            'categoriePer' => $categoriePer,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing categoriePer entity.
     *
     * @Route("/{numcategpers}/edit", name="categoriepers_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, CategoriePers $categoriePer)
    {
        $deleteForm = $this->createDeleteForm($categoriePer);
        $editForm = $this->createForm('AppBundle\Form\CategoriePersType', $categoriePer);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('categoriepers_edit', array('numcategpers' => $categoriePer->getNumcategpers()));
        }

        return $this->render('categoriepers/edit.html.twig', array(
            'categoriePer' => $categoriePer,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a categoriePer entity.
     *
     * @Route("/{numcategpers}", name="categoriepers_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, CategoriePers $categoriePer)
    {
        $form = $this->createDeleteForm($categoriePer);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($categoriePer);
            $em->flush();
        }

        return $this->redirectToRoute('categoriepers_index');
    }

    /**
     * Creates a form to delete a categoriePer entity.
     *
     * @param CategoriePers $categoriePer The categoriePer entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(CategoriePers $categoriePer)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categoriepers_delete', array('numcategpers' => $categoriePer->getNumcategpers())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
