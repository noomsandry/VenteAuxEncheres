<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Prelevement;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Prelevement controller.
 *
 * @Route("prelevement")
 */
class PrelevementController extends Controller
{
    /**
     * Lists all prelevement entities.
     *
     * @Route("/", name="prelevement_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $prelevements = $em->getRepository('AppBundle:Prelevement')->findAll();

        return $this->render('prelevement/index.html.twig', array(
            'prelevements' => $prelevements,
        ));
    }

    /**
     * Creates a new prelevement entity.
     *
     * @Route("/new", name="prelevement_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $prelevement = new Prelevement();
        $form = $this->createForm('AppBundle\Form\PrelevementType', $prelevement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($prelevement);
            $em->flush();

            return $this->redirectToRoute('prelevement_show', array('numprelev' => $prelevement->getNumprelev()));
        }

        return $this->render('prelevement/new.html.twig', array(
            'prelevement' => $prelevement,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a prelevement entity.
     *
     * @Route("/{numprelev}", name="prelevement_show")
     * @Method("GET")
     */
    public function showAction(Prelevement $prelevement)
    {
        $deleteForm = $this->createDeleteForm($prelevement);

        return $this->render('prelevement/show.html.twig', array(
            'prelevement' => $prelevement,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing prelevement entity.
     *
     * @Route("/{numprelev}/edit", name="prelevement_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Prelevement $prelevement)
    {
        $deleteForm = $this->createDeleteForm($prelevement);
        $editForm = $this->createForm('AppBundle\Form\PrelevementType', $prelevement);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('prelevement_edit', array('numprelev' => $prelevement->getNumprelev()));
        }

        return $this->render('prelevement/edit.html.twig', array(
            'prelevement' => $prelevement,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a prelevement entity.
     *
     * @Route("/{numprelev}", name="prelevement_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Prelevement $prelevement)
    {
        $form = $this->createDeleteForm($prelevement);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($prelevement);
            $em->flush();
        }

        return $this->redirectToRoute('prelevement_index');
    }

    /**
     * Creates a form to delete a prelevement entity.
     *
     * @param Prelevement $prelevement The prelevement entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Prelevement $prelevement)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('prelevement_delete', array('numprelev' => $prelevement->getNumprelev())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
