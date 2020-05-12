<?php


namespace KMA\IikoApi\Api;

use GuzzleHttp;

class Request
{
    protected static function client()
    {
        return new GuzzleHttp\Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'base_uri' => 'https://iiko.biz:9900/api/0/',
            'http_errors' => false
        ]);
    }

    public static function get(string $url, array $query = [])
    {
        return self::client()->request('GET', $url, ['query' => $query]);
    }

    public static function post(string $url, array $data)
    {
        return self::client()->request('POST', $url, $data);
    }
}
