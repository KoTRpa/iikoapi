<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\Nomenclature as Entity;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;

/**
 * Nomenclature APIs
 * @package KMA\IikoApi\Api
 * @version 1.0.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait Nomenclature
{
    /**
     * @param string $orgId iiko organization id
     * @return Entity KMA\IikoApi\Entity\Nomenclature
     * @throws \JsonMapper_Exception
     * @throws IikoApiException
     */
    public function nomenclature(string $orgId): Entity
    {
        $endpoint = '/nomenclature/' . $orgId;

        $params = [
            'access_token' => $this->token(),
        ];

        $response = $this->get($endpoint, $params);

        return (new JsonMapper())->mapArray(
            $response->getDecodedBody(), new Entity()
        );
    }
}