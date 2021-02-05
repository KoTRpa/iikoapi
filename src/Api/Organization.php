<?php


namespace KMA\IikoApi\Api;

use JsonMapper;
use KMA\IikoApi\Entities\OrganizationInfo;
use KMA\IikoApi\Exceptions\IikoApiException;
use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;

/**
 * Organization APIs
 * @package KMA\IikoApi\Api
 * @version 0.1.0
 *
 * @mixin Http
 * @mixin Iiko
 */
trait Organization
{
    /**
     * @return OrganizationInfo[]
     * @throws \JsonMapper_Exception
     * @throws IikoApiException
     */
    public function organizationList(): array
    {
        $endpoint = '/organization/list';

        $params = [
            'access_token' => $this->token(),
        ];

        $response = $this->get($endpoint, $params);

        $json = \GuzzleHttp\json_decode($response->getBody(), false);


        return (new JsonMapper())->mapArray(
            $json,
            [],
            OrganizationInfo::class
        );
    }
}
