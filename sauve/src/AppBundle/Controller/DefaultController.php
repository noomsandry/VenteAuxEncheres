<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Analyse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Analyse controller.
 *
 * @Route("/")
 */
class DefaultController extends Controller
{
    /**
     * Lists all analyse entities.
     *
     * @Route("/", name="index")
     * @Method("GET")
     */
    public function indexAction()
    {
        return $this->render('base.html.twig');
    }

}
