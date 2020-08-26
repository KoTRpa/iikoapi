<?php

namespace KMA\IikoApi;

use JsonMapper;
use KMA\IikoApi\Exceptions\IikoResponseException;


class Iiko
{

    use Traits\HasContainer;
    use Traits\Http;

    use Api\Token,
        Api\Nomenclature;

    protected JsonMapper $mapper;

    protected $config;

    protected string $token;

    public function __construct($config, $async = false, $httpClientHandler = null)
    {
        $this->mapper = new JsonMapper();

        $this->config = $config;
    }

    /**
     * Get the specified configuration value.
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getConfig($key, $default = null)
    {
        return data_get($this->config, $key, $default);
    }



}
