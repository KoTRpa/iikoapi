<?php


namespace KMA\IikoApi\Api;

use JsonMapper;
use KMA\IikoApi\Entity\OrganizationInfo;
use KMA\IikoApi\Exceptions\IikoApiException;
use KMA\IikoApi\Iiko;
use KMA\IikoApi\Traits\Http;

/**
 * Trait Organization
 * @package KMA\IikoApi\Api
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

        return (new JsonMapper())->mapArray(
            $response->getDecodedBody(),
            [],
            OrganizationInfo::class
        );
    }
}
