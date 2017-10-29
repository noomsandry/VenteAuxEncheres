<?php
/**
 * Created by PhpStorm.
 * User: Mahandrisoa
 * Date: 20/10/2017
 * Time: 09:21
 */

namespace MembreBundle\Event;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTAuthenticatedEvent;


class JWTAuthenticatedListener
{
    /**
     * @param JWTAuthenticatedEvent $event
     *
     * @return void
     */
    public function onJWTAuthenticated(JWTAuthenticatedEvent $event)
    {
        $token = $event->getToken();
        $payload = $event->getPayload();

        $token->setAttribute('uuid', $payload['uuid']);
    }
}