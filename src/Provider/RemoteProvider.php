<?php


namespace KMA\IikoApi\Provider;

use GuzzleHttp\Client;

class RemoteProvider
{
    private Client $client;

    public function __construct()
    {
        $this->client = new Client([
            'headers' => [
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
            'http_errors' => false
        ]);
    }

    public function get(string $url, array $query = [])
    {
        /* TODO: wrap answer to Response */
        return $this->client->request('GET', $url, ['query' => $query]);
    }

    public function post(string $url, array $data)
    {
        /* TODO: wrap answer to Response */
        return $this->client->request('POST', $url, $data);
    }
}
