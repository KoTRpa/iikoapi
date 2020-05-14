<?php


namespace KMA\IikoApi\Api;


use JsonMapper;
use KMA\IikoApi\Entity\OrganizationInfo;
use KMA\IikoApi\Exceptions\IikoResponseException;

class Organization extends \KMA\IikoApi\Api
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

        $org = $this->fetch($response);

        $mapper = new JsonMapper();

        $result = $mapper->mapArray(
            $org, [], OrganizationInfo::class
        );

        return $result;
    }
}
