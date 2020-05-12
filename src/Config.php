<?php


namespace KMA\IikoApi;


use KMA\IikoApi\Exceptions\NotSetConfigProviderException;

/**
 * Class Config
 * @package KMA\IikoApi
 *
 * Config provider are used to create Api object
 * and must contains url, user and password
 * Setup it before api calls with Config::init() method
 */
class Config
{
    protected static IConfig $provider;

    /**
     * @return IConfig
     * @throws NotSetConfigProviderException
     */
    public static function provider(): IConfig
    {
        if (!self::$provider) {
            throw new NotSetConfigProviderException('Setup config provider with Config::init before start using api');
        }
        return self::$provider;
    }

    /**
     * @param IConfig $provider
     */
    public static function init(IConfig $provider): void
    {
        self::$provider = $provider;
    }
}
