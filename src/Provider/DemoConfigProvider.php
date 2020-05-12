<?php


namespace KMA\IikoApi\Provider;


use KMA\IikoApi\IConfig;

class DemoConfigProvider implements IConfig
{
    protected string $url = 'https://iiko.biz:9900/api/0';
    protected string $user = 'demoDelivery';
    protected string $pass = 'PI1yFaKFCGvvJKi';


    public function url(): string
    {
        return $this->url;
    }

    public function user(): string
    {
        return $this->user;
    }

    public function password(): string
    {
        return $this->pass;
    }
}
