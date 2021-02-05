<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entities\Street;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;

/**
 * Streets APIs
 * @package KMA\IikoApi\Api
 * @version 1.0.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait Streets
{
    /**
     * @param string $orgId iiko organization id
     * @param string $cityId
     * @return Street[] KMA\IikoApi\Entities\Nomenclature
     * @throws IikoApiException
     * @throws \JsonMapper_Exception
     */
    public function streets(string $orgId, string $cityId): array
    {
        $endpoint = '/streets/streets';

        $params = [
            'access_token' => $this->token(),
            'organization' => $orgId,
            'city' => $cityId
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->mapArray(
            $json, [], Street::class
        );
    }
}
