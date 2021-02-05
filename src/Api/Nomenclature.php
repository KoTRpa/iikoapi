<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Entities\Nomenclature as NomenclatureEntity;
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
     * @return NomenclatureEntity KMA\IikoApi\Entities\Nomenclature
     * @throws \JsonMapper_Exception
     * @throws IikoApiException
     */
    public function nomenclature(string $orgId): NomenclatureEntity
    {
        $endpoint = '/nomenclature/' . $orgId;

        $params = [
            'access_token' => $this->token(),
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);

        return (new JsonMapper())->map(
            (object)$json, new NomenclatureEntity()
        );
    }
}
