<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Api;
use KMA\IikoApi\Entity\OrganizationInfo;
use KMA\IikoApi\Exceptions\IikoResponseException;

class OrganizationApi extends Api
{
    /**
     * @return OrganizationInfo[]
     * @throws \JsonMapper_Exception
     * @throws IikoResponseException
     */
    public function get(): array
    {
        $url = $this->url . '/organization/list';
        $query = ['access_token' => $this->token];

        $response = $this->remote->get($url, $query);

        return $this->mapper->mapArray(
            $response, [], OrganizationInfo::class
        );
    }
}
