<?php


namespace KMA\IikoApi\Api;


use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;

use KMA\IikoApi\Exceptions\IikoApiException;

/**
 * Trait Token
 * @package KMA\IikoApi\Api
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
