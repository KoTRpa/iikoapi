<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Provider\HttpProvider;

class Nomenclature extends \KMA\IikoApi\Api
{
    public function get()
    {
        $http = new HttpProvider();
        $token = $this->token();
        $uri = '/nomenclature/{organizationId}?access_token={accessToken}';

        $url = $this->url . $uri;
        $query = ['user_id' => $this->user, 'user_secret' => $this->pass];

        $response = $http->get($url, $query);

        return $this->fetch($response);
    }
}
