<?php
/**
 * Created by PhpStorm.
 * User: Mahandrisoa
 * Date: 20/10/2017
 * Time: 09:29
 */

namespace MembreBundle\Event;

use Lexik\Bundle\JWTAuthenticationBundle\Event\AuthenticationFailureEvent;
use Lexik\Bundle\JWTAuthenticationBundle\Response\JWTAuthenticationFailureResponse;

class AuthenticationFailureListener
{
    /**
     * @param AuthenticationFailureEvent $event
     */
    public function onAuthenticationFailureResponse(AuthenticationFailureEvent $event)
    {
        $data = [
            'status'  => '401 Unauthorized',
            'message' => 'Bad credentials, please verify that your username/password are correctly set',
        ];

        $response = new JWTAuthenticationFailureResponse($data);

        $event->setResponse($response);
    }
}