<?php


namespace KMA\IikoApi\Api;


use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;

use KMA\IikoApi\Exceptions\IikoApiException;

/**
 * Get Token API
 * @package KMA\IikoApi\Api
 * @version 1.0.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait Token
{
    /**
     * @return string
     * @throws IikoApiException
     */
    protected function token(): string
    {
        $user = $this->getConfig('user');
        $pass = $this->getConfig('password');
        $endpoint = '/auth/access_token';
        $params = ['user_id' => $user, 'user_secret' => $pass];
        $response = $this->get($endpoint, $params);
        return $response->getDecodedBody();
    }
}
