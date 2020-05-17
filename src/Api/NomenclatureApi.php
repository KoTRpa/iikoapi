<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Api;
use KMA\IikoApi\Exceptions\IikoResponseException;

class Nomenclature extends Api
{
    /**
     * @param string $organisationId
     * @return \KMA\IikoApi\Entity\Nomenclature
     * @throws \JsonMapper_Exception
     * @throws IikoResponseException
     */
    public function get(string $organisationId): \KMA\IikoApi\Entity\Nomenclature
    {
        $url = $this->url . '/nomenclature/' . $organisationId;

        $query = [
            'access_token' => $this->token,
            'user_id' => $this->user,
            'user_secret' => $this->pass,
        ];

        $response = $this->remote->get($url, $query);

        return $this->mapper->map(
            $response, new \KMA\IikoApi\Entity\Nomenclature()
        );
    }
}
