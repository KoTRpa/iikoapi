<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entity\Nomenclature as Entity;
use KMA\IikoApi\Exceptions\IikoApiException;

use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;
use JsonMapper;

/**
 * Trait Nomenclature
 * @package KMA\IikoApi\Api
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
