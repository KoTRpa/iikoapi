<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\Nomenclature;
use KMA\IikoApi\Exceptions\IikoResponseException;

class NomenclatureApi extends Api
{
    /**
     * @param string $organisationId
     * @return Nomenclature
     * @throws \JsonMapper_Exception
     * @throws IikoResponseException
     */
    public function get(string $organisationId): Nomenclature
    {
        $url = $this->url . '/nomenclature/' . $organisationId;

        $query = [
            'access_token' => $this->token,
            'user_id' => $this->user,
            'user_secret' => $this->pass,
        ];

        $response = $this->remote->get($url, $query);

        return $this->mapper->map(
            $response, new Nomenclature()
        );
    }
}
