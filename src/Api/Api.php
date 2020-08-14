<?php


namespace KMA\IikoApi\Api;

use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Exceptions\NotSetConfigProviderException;
use KMA\IikoApi\Config\RemoteProvider;

class Api
{
    protected string $url;
    protected string $user;
    protected string $pass;

    protected RemoteProvider $remote;
    protected \JsonMapper $mapper;

    protected string $token;

    protected string $organizationId;

    /**
     * Api constructor.
     * @throws NotSetConfigProviderException
     * @throws IikoResponseException
     */
    public function __construct($async = false, $httpClientHandler = null)
    {
        $config = Config::provider();
        $this->url = $config->url();
        $this->user = $config->user();
        $this->pass = $config->password();

        $this->remote = new RemoteProvider();
        $this->mapper = new \JsonMapper();

        $this->token = $this->token();
    }

    public static function organization(): Api\OrganizationApi
    {
        return new Api\OrganizationApi();
    }

    public static function nomenclature(): Api\NomenclatureApi
    {
        return new Api\NomenclatureApi();
    }

    public static function order(): Api\OrderApi
    {
        return new Api\OrderApi();
    }


    /**
     * @return string
     * @throws IikoResponseException
     */
    protected function token(): string
    {
        $url = $this->url . '/auth/access_token';
        $query = ['user_id' => $this->user, 'user_secret' => $this->pass];

        return $this->remote->get($url, $query);

    }
}
