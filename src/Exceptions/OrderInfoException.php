<?php

namespace KMA\IikoApi\Exceptions;

class OrderInfoException extends \Exception
{
    public function __construct($message = "", $code = 0, \Throwable $previous = null)
    {
        if (null !== $previous && ($previous instanceof IikoResponseException)) {
            $responseHttpCode = $previous->getResponse()->getHttpStatusCode();
            $code = $responseHttpCode;
            switch ($responseHttpCode) {
                case 400:
                    $body = $previous->getResponseData();
                    if (!isset($body['ModelState']['order'])) {
                        $message .= ' Extended error message (ModelState.order) is missing';
                    } else {
                        $message .= ' ' . implode(' ', $body['ModelState']['order']);
                    }
                    break;

                case 500: // in iiko this meant "not found" ><
                    $message .= ' Order not found';
                    break;
                default:
                    $message .= ' Unknown httpCode ' . $responseHttpCode;
            }
        }

        parent::__construct($message, $code, $previous);
    }
}
