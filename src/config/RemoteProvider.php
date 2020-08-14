<?php


namespace KMA\IikoApi\Config;

use GuzzleHttp\Client;
use KMA\IikoApi\Exceptions\IikoResponseException;
use Psr\Http\Message\ResponseInterface;

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

    /**
     * @param string $url
     * @param array $query
     * @return array|\stdClass|string
     * @throws IikoResponseException
     */
    public function get(string $url, array $query = [])
    {
        $result = $this->client->request('GET', $url, ['query' => $query]);
        return $this->response($result);
    }

    /**
     * @param string $url
     * @param array $data
     * @return array|\stdClass|string
     * @throws IikoResponseException
     */
    public function post(string $url, array $data)
    {
        $result = $this->client->request('POST', $url, $data);
        return $this->response($result);
    }

    /**
     * @param ResponseInterface $response
     * @return string|array|\stdClass
     * @throws IikoResponseException
     */
    protected function response(ResponseInterface $response)
    {
        $statusCode = $response->getStatusCode();

        $body = $response->getBody()->getContents();
        /* guzzle json_decode thrown an exception on decode error */

        if ($statusCode >= 400 || empty($body)) {
            if (!empty($body)) {
                /* guzzle json_decode also thrown an exception on decode error */
                try {
                    $error = \GuzzleHttp\json_decode($body, true);
                } catch (\Exception $e) {
                    $error = ['message' => 'Ответ содежит невалидный JSON', 'code' => 600, 'httpStatusCode' => $statusCode];
                }
            } else {
                $error = ['message' => 'Пустой ответ', 'code' => 600, 'httpStatusCode' => $statusCode];
            }
            // on code over 400 iiko returns in body error json
            throw new IikoResponseException($error);
        }

        return \GuzzleHttp\json_decode($body);
    }
}
