<?php


namespace KMA\IikoApi\Api;


use KMA\IikoApi\Api;
use KMA\IikoApi\Entity\OrderInfo;
use KMA\IikoApi\Entity\OrderRequest;
use KMA\IikoApi\Exceptions\IikoResponseException;
use KMA\IikoApi\Type\TimeSpan;

class Order extends Api
{
    public function add(OrderRequest $orderRequest, ?TimeSpan $timeout = null): OrderInfo
    {
        $url = $this->url . '/orders/add';

        if (null === $timeout) {
            $timeout = new TimeSpan(0, 1, 0);
        }

        $query = [
            'access_token' => $this->token,
            'requestTimeout' => (string)$timeout,
            'body' => \GuzzleHttp\json_encode($orderRequest, JSON_UNESCAPED_UNICODE)
        ];

        $response = $this->remote->post($url, $query);

        $statusCode = $response->getStatusCode();

        /* guzzle json_decode thrown an exception on decode error */
        $body = \GuzzleHttp\json_decode($response->getBody()->getContents(), true);

        if ($statusCode >= 400 || empty($body)) {
            // on code over 400 iiko returns in body error json
            throw new IikoResponseException($body);
        }

        return OrderInfo::fromArray($body);
    }
}
