<?php

namespace MembreBundle\Controller;

use FOS\RestBundle\Controller\Annotations\RouteResource;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Routing\ClassResourceInterface;

/**
 * Class RestLoginController
 * @package MembreBundle\Controller
 * @RouteResource("login", pluralize =false)
 */
class RestLoginController extends FOSRestController implements ClassResourceInterface
{
    public function postAction()
    {
        throw new \DomainException('You should never see this');
    }

}
